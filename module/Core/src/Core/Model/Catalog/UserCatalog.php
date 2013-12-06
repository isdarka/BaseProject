<?php
/**
 *
 * @author isdarka
 * @created Nov 26, 2013 4:00:28 PM
 */

namespace Core\Model\Catalog;

use Model\Bean\AbstractBean;
use Core\Model\Metadata\UserMetadata;
use Core\Model\Exception\UserException;
use Core\Model\Bean\Person;

use Zend\Db\Sql\Where;
// use Zend\Authentication\Adapter\Exception\ExceptionInterface;
class UserCatalog extends PersonCatalog
{
	
	protected function getMetadata()
	{
		return new UserMetadata();
	}
	
	protected function create(AbstractBean $bean)
	{
		try {
			parent::create($bean);
			$this->insert = $this->sql->insert(self::getMetadata()->getTableName());
			$data = self::getMetadata()->toCreateArray($bean);
			$data = array_filter($data, array($this, 'isNotNull'));
			$this->insert->values($data);
			$this->execute($this->insert);
			
			$this->getMetadata()->getFactory()->populate($bean, array(
					self::getMetadata()->getPrimaryKey() => $this->getLastInsertId(),
			));
		}catch (\Zend\Db\Exception\ExceptionInterface $e) { 			
			throw $e;
		} catch (\Exception $e) {
			throw $e;
		}
	}
	
	protected function update(AbstractBean $bean)
	{
		try {
			parent::update($bean);
			$this->update = $this->sql->update(self::getMetadata()->getTableName());
			$data = self::getMetadata()->toUpdateArray($bean);
			$data = array_filter($data, array($this, 'isNotNull'));
			$this->update->set($data);
			$where = new Where();
			$where->equalTo(self::getMetadata()->getPrimaryKey(), $bean->getIdUser());
			$this->update->where($where);
			$this->execute($this->update);
		}catch (\Zend\Db\Exception\ExceptionInterface $e) {
			throw $e;
		} catch (\Exception $e) {
			throw $e;
		}
	}
}
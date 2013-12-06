<?php
/**
 *
 * @author isdarka
 * @created Nov 26, 2013 3:57:38 PM
 */

namespace Core\Model\Catalog;

use Model\Catalog\AbstractCatalog;
use Core\Model\Metadata\PersonMetadata;
use Model\Bean\AbstractBean;
use Zend\Db\Sql\Where;
use Core\Model\Bean\Person;

class PersonCatalog extends AbstractCatalog
{
	/**
	 *
	 * @return ModelMetadata
	 */
	protected function getMetadata()
	{
		return new PersonMetadata();
	}
	
	protected function create(AbstractBean $bean)
	{
		try {
			$this->insert = $this->sql->insert(self::getMetadata()->getTableName());
			$this->insert->values(self::getMetadata()->toCreateArray($bean));
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
			$this->update = $this->sql->update(self::getMetadata()->getTableName());
			$data = self::getMetadata()->toUpdateArray($bean);
			$data = array_filter($data, array($this, 'isNotNull'));
			$this->update->set($data);
			$where = new Where();
			$where->equalTo(self::getMetadata()->getPrimaryKey(), $bean->getIdPerson());
			$this->update->where($where);
			$this->execute($this->update);
		}catch (\Zend\Db\Exception\ExceptionInterface $e) {
			throw $e;
		} catch (\Exception $e) {
			throw $e;
		}
	}
}
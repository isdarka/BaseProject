<?php

/**
 *
 * UserLogCatalog
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Catalog
 * @copyright 
 * @license 
 * @created Mon Dec 9 11:15:21 2013
 * @version 1.0
 */

namespace Core\Model\Catalog;

use Model\Bean\AbstractBean;
use Core\Model\Metadata\UserLogMetadata;
use Core\Model\Exception\UserLogException;
use Zend\Db\Sql\Where;
use Core\Model\Catalog\LogCatalog;

class UserLogCatalog extends LogCatalog
{

		
 	/**
 	 *
 	 * Get UserLogMetadata
 	 *
 	 * @return UserLogMetadata
 	 */
	public function getMetadata() 
	{
		return new UserLogMetadata();
	}
		
 	/**
 	 *
 	 * Create UserLog
 	 *
 	 */
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
		} catch (\Zend\Db\Exception\ExceptionInterface $e) {
			throw $e;
		} catch (UserLogException $e) {
			throw $e;
		}
	}
		
 	/**
 	 *
 	 * Update UserLog
 	 *
 	 */
	protected function update(AbstractBean $bean) 
	{
		try {
			parent::create($bean);
			$this->update = $this->sql->update(self::getMetadata()->getTableName());
			$data = self::getMetadata()->toUpdateArray($bean);
			$data = array_filter($data, array($this, 'isNotNull'));
			$this->update->set($data);
			$where = new Where();
			$where->equalTo(self::getMetadata()->getPrimaryKey(), $bean->get());
			$this->update->where($where);
			$this->execute($this->update);
		} catch (\Zend\Db\Exception\ExceptionInterface $e) {
			throw $e;
		} catch (UserLogException $e) {
			throw $e;
		}
	}
}
<?php

/**
 *
 * UserCatalog
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
use Core\Model\Metadata\UserMetadata;
use Core\Model\Exception\UserException;
use Zend\Db\Sql\Where;
use Core\Model\Catalog\PersonCatalog;

class UserCatalog extends PersonCatalog
{

		
 	/**
 	 *
 	 * Get UserMetadata
 	 *
 	 * @return UserMetadata
 	 */
	public function getMetadata() 
	{
		return new UserMetadata();
	}
		
 	/**
 	 *
 	 * Create User
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
		} catch (UserException $e) {
			throw $e;
		}
	}
		
 	/**
 	 *
 	 * Update User
 	 *
 	 */
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
		} catch (\Zend\Db\Exception\ExceptionInterface $e) {
			throw $e;
		} catch (UserException $e) {
			throw $e;
		}
	}
}
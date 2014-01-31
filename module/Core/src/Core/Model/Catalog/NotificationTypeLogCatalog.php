<?php

/**
 *
 * NotificationTypeLogCatalog
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Catalog
 * @copyright 
 * @license 
 * @created Fri Jan 31 09:48:50 2014
 * @version 1.0
 */

namespace Core\Model\Catalog;

use Model\Bean\AbstractBean;
use Core\Model\Metadata\NotificationTypeLogMetadata;
use Core\Model\Exception\NotificationTypeLogException;
use Zend\Db\Sql\Where;

class NotificationTypeLogCatalog extends LogCatalog
{

		
 	/**
 	 *
 	 * Get NotificationTypeLogMetadata
 	 *
 	 * @return NotificationTypeLogMetadata
 	 */
	public function getMetadata() 
	{
		return new NotificationTypeLogMetadata();
	}
		
 	/**
 	 *
 	 * Create NotificationTypeLog
 	 *
 	 */
	protected function create(AbstractBean $bean) 
	{
		try {
			parent::create($bean);
			$this->insert = $this->sql->insert(self::getMetadata()->getTableName());
			$data = self::getMetadata()->toCreateArray($bean);
			$data = array_filter($data, array($this, 'isNotNull'));
			$data = array_map(array($this, 'filterTags'), $data);
			$this->insert->values($data);
			$this->execute($this->insert);
			$this->getMetadata()->getFactory()->populate($bean, array(
				self::getMetadata()->getPrimaryKey() => $this->getLastInsertId(),
			));
		} catch (\Zend\Db\Exception\ExceptionInterface $e) {
			throw $e;
		} catch (NotificationTypeLogException $e) {
			throw $e;
		}
	}
		
 	/**
 	 *
 	 * Update NotificationTypeLog
 	 *
 	 */
	protected function update(AbstractBean $bean) 
	{
		try {
			parent::update($bean);
			$this->update = $this->sql->update(self::getMetadata()->getTableName());
			$data = self::getMetadata()->toUpdateArray($bean);
			$data = array_filter($data, array($this, 'isNotNull'));
			$data = array_map(array($this, 'filterTags'), $data);
			$this->update->set($data);
			$where = new Where();
			$where->equalTo(self::getMetadata()->getPrimaryKey(), $bean->getIdNotificationTypeLog());
			$this->update->where($where);
			$this->execute($this->update);
		} catch (\Zend\Db\Exception\ExceptionInterface $e) {
			throw $e;
		} catch (NotificationTypeLogException $e) {
			throw $e;
		}
	}
		
 	/**
 	 *
 	 * Delete NotificationTypeLog
 	 *
 	 */
	public function delete(AbstractBean $bean) 
	{
		try {
			parent::delete($bean);
			$this->delete = $this->sql->delete($this->getMetadata()->getTableName());
			$where = new Where();
			$where->equalTo(self::getMetadata()->getPrimaryKey(), $bean->getIdNotificationTypeLog());
			$this->delete->where($where);
			$this->execute($this->delete);
		} catch (\Zend\Db\Exception\ExceptionInterface $e) {
			throw $e;
		} catch (NotificationTypeLogException $e) {
			throw $e;
		}
	}
}
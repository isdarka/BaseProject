<?php

/**
 *
 * MessageLogCatalog
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Catalog
 * @copyright 
 * @license 
 * @created Wed Jan 29 11:43:50 2014
 * @version 1.0
 */

namespace Core\Model\Catalog;

use Model\Bean\AbstractBean;
use Core\Model\Metadata\MessageLogMetadata;
use Core\Model\Exception\MessageLogException;
use Zend\Db\Sql\Where;

class MessageLogCatalog extends LogCatalog
{

		
 	/**
 	 *
 	 * Get MessageLogMetadata
 	 *
 	 * @return MessageLogMetadata
 	 */
	public function getMetadata() 
	{
		return new MessageLogMetadata();
	}
		
 	/**
 	 *
 	 * Create MessageLog
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
		} catch (MessageLogException $e) {
			throw $e;
		}
	}
		
 	/**
 	 *
 	 * Update MessageLog
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
			$where->equalTo(self::getMetadata()->getPrimaryKey(), $bean->getIdMessageLog());
			$this->update->where($where);
			$this->execute($this->update);
		} catch (\Zend\Db\Exception\ExceptionInterface $e) {
			throw $e;
		} catch (MessageLogException $e) {
			throw $e;
		}
	}
		
 	/**
 	 *
 	 * Delete MessageLog
 	 *
 	 */
	public function delete(AbstractBean $bean) 
	{
		try {
			parent::delete($bean);
			$this->delete = $this->sql->delete($this->getMetadata()->getTableName());
			$where = new Where();
			$where->equalTo(self::getMetadata()->getPrimaryKey(), $bean->getIdMessageLog());
			$this->delete->where($where);
			$this->execute($this->delete);
		} catch (\Zend\Db\Exception\ExceptionInterface $e) {
			throw $e;
		} catch (MessageLogException $e) {
			throw $e;
		}
	}
}
<?php

/**
 *
 * LogCatalog
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
use Core\Model\Metadata\LogMetadata;
use Core\Model\Exception\LogException;
use Zend\Db\Sql\Where;
use Model\Catalog\AbstractCatalog;

class LogCatalog extends AbstractCatalog
{

		
 	/**
 	 *
 	 * Get LogMetadata
 	 *
 	 * @return LogMetadata
 	 */
	public function getMetadata() 
	{
		return new LogMetadata();
	}
		
 	/**
 	 *
 	 * Create Log
 	 *
 	 */
	protected function create(AbstractBean $bean) 
	{
		try {
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
		} catch (LogException $e) {
			throw $e;
		}
	}
		
 	/**
 	 *
 	 * Update Log
 	 *
 	 */
	protected function update(AbstractBean $bean) 
	{
		try {
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
		} catch (LogException $e) {
			throw $e;
		}
	}
}
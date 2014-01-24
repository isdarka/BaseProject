<?php

/**
 *
 * FileLogCatalog
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Catalog
 * @copyright 
 * @license 
 * @created Mon Dec 23 12:44:25 2013
 * @version 1.0
 */

namespace Core\Model\Catalog;

use Model\Bean\AbstractBean;
use Core\Model\Metadata\FileLogMetadata;
use Core\Model\Exception\FileLogException;
use Zend\Db\Sql\Where;

class FileLogCatalog extends LogCatalog
{

		
 	/**
 	 *
 	 * Get FileLogMetadata
 	 *
 	 * @return FileLogMetadata
 	 */
	public function getMetadata() 
	{
		return new FileLogMetadata();
	}
		
 	/**
 	 *
 	 * Create FileLog
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
		} catch (FileLogException $e) {
			throw $e;
		}
	}
		
 	/**
 	 *
 	 * Update FileLog
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
			$where->equalTo(self::getMetadata()->getPrimaryKey(), $bean->getIdFileLog());
			$this->update->where($where);
			$this->execute($this->update);
		} catch (\Zend\Db\Exception\ExceptionInterface $e) {
			throw $e;
		} catch (FileLogException $e) {
			throw $e;
		}
	}
		
 	/**
 	 *
 	 * Delete FileLog
 	 *
 	 */
	public function delete(AbstractBean $bean) 
	{
		try {
			parent::delete($bean);
			$this->delete = $this->sql->delete($this->getMetadata()->getTableName());
			$where = new Where();
			$where->equalTo(self::getMetadata()->getPrimaryKey(), $bean->getIdFileLog());
			$this->delete->where($where);
			$this->execute($this->delete);
		} catch (\Zend\Db\Exception\ExceptionInterface $e) {
			throw $e;
		} catch (FileLogException $e) {
			throw $e;
		}
	}
}
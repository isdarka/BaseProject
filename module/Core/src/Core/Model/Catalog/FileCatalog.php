<?php

/**
 *
 * FileCatalog
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
use Core\Model\Metadata\FileMetadata;
use Core\Model\Exception\FileException;
use Zend\Db\Sql\Where;
use Model\Catalog\AbstractCatalog;

class FileCatalog extends AbstractCatalog
{

		
 	/**
 	 *
 	 * Get FileMetadata
 	 *
 	 * @return FileMetadata
 	 */
	public function getMetadata() 
	{
		return new FileMetadata();
	}
		
 	/**
 	 *
 	 * Create File
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
		} catch (FileException $e) {
			throw $e;
		}
	}
		
 	/**
 	 *
 	 * Update File
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
			$where->equalTo(self::getMetadata()->getPrimaryKey(), $bean->getIdFile());
			$this->update->where($where);
			$this->execute($this->update);
		} catch (\Zend\Db\Exception\ExceptionInterface $e) {
			throw $e;
		} catch (FileException $e) {
			throw $e;
		}
	}
		
 	/**
 	 *
 	 * Delete File
 	 *
 	 */
	public function delete(AbstractBean $bean) 
	{
		try {
			$this->delete = $this->sql->delete($this->getMetadata()->getTableName());
			$where = new Where();
			$where->equalTo(self::getMetadata()->getPrimaryKey(), $bean->getIdFile());
			$this->delete->where($where);
			$this->execute($this->delete);
		} catch (\Zend\Db\Exception\ExceptionInterface $e) {
			throw $e;
		} catch (FileException $e) {
			throw $e;
		}
	}
}
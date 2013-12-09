<?php

/**
 *
 * RoleLogCatalog
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Catalog
 * @copyright 
 * @license 
 * @created Sun Dec 8 19:21:50 2013
 * @version 1.0
 */

namespace Core\Model\Catalog;

use Model\Bean\AbstractBean;
use Core\Model\Metadata\RoleLogMetadata;
use Core\Model\Exception\RoleLogException;
use Zend\Db\Sql\Where;
use Core\Model\Catalog\LogCatalog;

class RoleLogCatalog extends LogCatalog
{

		
 	/**
 	 *
 	 * Get RoleLogMetadata
 	 *
 	 * @return RoleLogMetadata
 	 */
	public function getMetadata() 
	{
		return new RoleLogMetadata();
	}
		
 	/**
 	 *
 	 * Create RoleLog
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
		} catch (RoleLogException $e) {
			throw $e;
		}
	}
		
 	/**
 	 *
 	 * Update RoleLog
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
		} catch (RoleLogException $e) {
			throw $e;
		}
	}
}
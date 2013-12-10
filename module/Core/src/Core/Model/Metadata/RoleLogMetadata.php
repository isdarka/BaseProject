<?php

/**
 *
 * RoleLogBean
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Metadata
 * @copyright 
 * @license 
 * @created Mon Dec 9 11:22:30 2013
 * @version 1.0
 */

namespace Core\Model\Metadata;

use Model\Bean\AbstractBean;
use Model\Metadata\AbstractMetadata;
use Core\Model\Bean\RoleLog;
use Core\Model\Factory\RoleLogFactory;
use Core\Model\Collection\RoleLogCollection;

class RoleLogMetadata extends AbstractMetadata
{

		
 	/**
 	 *
 	 * toUpdateArray
 	 *
 	 */
	public function toUpdateArray(AbstractBean $bean) 
	{
		return $bean->toArrayFor(
			array(
				RoleLog::ID_ROLE,
				RoleLog::ID_LOG,
			)
		);
	}
		
 	/**
 	 *
 	 * toCreateArray
 	 *
 	 */
	public function toCreateArray(AbstractBean $bean) 
	{
		return $bean->toArrayFor(
			array(
				RoleLog::ID_ROLE_LOG,
				RoleLog::ID_ROLE,
				RoleLog::ID_LOG,
			)
		);
	}
		
 	/**
 	 *
 	 * Get Entity Name
 	 *
 	 * @return string
 	 */
	public function getEntityName() 
	{
		return "RoleLog";
	}
		
 	/**
 	 *
 	 * Get TableName
 	 *
 	 * @return string
 	 */
	public function getTableName() 
	{
		return "core_role_logs";
	}
		
 	/**
 	 *
 	 * Get PrimaryKey
 	 *
 	 * @return string
 	 */
	public function getPrimaryKey() 
	{
		return "id_role_log";
	}
		
 	/**
 	 *
 	 * Get Factory
 	 *
 	 * @return RoleLogFactory
 	 */
	public function getFactory() 
	{
		static $factory = null;
		if( null == $factory ){
			$factory = new RoleLogFactory();
		}
		return $factory;
	}
		
 	/**
 	 *
 	 * Get Collection
 	 *
 	 * @return RoleLogCollection
 	 */
	public function newCollection() 
	{
		return new RoleLogCollection();
	}
		
 	/**
 	 *
 	 * Get Bean
 	 *
 	 * @return RoleLog
 	 */
	public function newBean() 
	{
		return new RoleLog();
	}
}
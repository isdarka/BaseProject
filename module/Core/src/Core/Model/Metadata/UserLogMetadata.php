<?php

/**
 *
 * UserLogBean
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
use Core\Model\Bean\UserLog;
use Core\Model\Factory\UserLogFactory;
use Core\Model\Collection\UserLogCollection;

class UserLogMetadata extends AbstractMetadata
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
				UserLog::ID_USER,
				UserLog::ID_LOG,
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
				UserLog::ID_USER_LOG,
				UserLog::ID_USER,
				UserLog::ID_LOG,
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
		return "UserLog";
	}
		
 	/**
 	 *
 	 * Get TableName
 	 *
 	 * @return string
 	 */
	public function getTableName() 
	{
		return "common_user_logs";
	}
		
 	/**
 	 *
 	 * Get PrimaryKey
 	 *
 	 * @return string
 	 */
	public function getPrimaryKey() 
	{
		return "id_user_log";
	}
		
 	/**
 	 *
 	 * Get Factory
 	 *
 	 * @return UserLogFactory
 	 */
	public function getFactory() 
	{
		static $factory = null;
		if( null == $factory ){
			$factory = new UserLogFactory();
		}
		return $factory;
	}
		
 	/**
 	 *
 	 * Get Collection
 	 *
 	 * @return UserLogCollection
 	 */
	public function newCollection() 
	{
		return new UserLogCollection();
	}
		
 	/**
 	 *
 	 * Get Bean
 	 *
 	 * @return UserLog
 	 */
	public function newBean() 
	{
		return new UserLog();
	}
}
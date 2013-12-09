<?php

/**
 *
 * LogBean
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Metadata
 * @copyright 
 * @license 
 * @created Sun Dec 8 14:42:34 2013
 * @version 1.0
 */

namespace Core\Model\Metadata;

use Model\Metadata\AbstractMetadata;
use Core\Model\Bean\Log;
use Core\Model\Factory\LogFactory;
use Core\Model\Collection\LogCollection;
use Model\Bean\AbstractBean;

class LogMetadata extends AbstractMetadata
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
				Log::ID_USER,
				Log::TIMESTAMP,
				Log::EVENT,
				Log::NOTE,
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
				Log::ID_LOG,
				Log::ID_USER,
				Log::TIMESTAMP,
				Log::EVENT,
				Log::NOTE,
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
		return "Log";
	}
		
 	/**
 	 *
 	 * Get TableName
 	 *
 	 * @return string
 	 */
	public function getTableName() 
	{
		return "core_logs";
	}
		
 	/**
 	 *
 	 * Get PrimaryKey
 	 *
 	 * @return string
 	 */
	public function getPrimaryKey() 
	{
		return "id_log";
	}
		
 	/**
 	 *
 	 * Get Factory
 	 *
 	 * @return LogFactory
 	 */
	public function getFactory() 
	{
		static $factory = null;
		if( null == $factory ){
			$factory = new LogFactory();
		}
		return $factory;
	}
		
 	/**
 	 *
 	 * Get Collection
 	 *
 	 * @return LogCollection
 	 */
	public function newCollection() 
	{
		return new LogCollection();
	}
}
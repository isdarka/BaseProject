<?php

/**
 *
 * FileLogBean
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Metadata
 * @copyright 
 * @license 
 * @created Mon Dec 23 12:44:25 2013
 * @version 1.0
 */

namespace Core\Model\Metadata;

use Model\Bean\AbstractBean;
use Model\Metadata\AbstractMetadata;
use Core\Model\Bean\FileLog;
use Core\Model\Factory\FileLogFactory;
use Core\Model\Collection\FileLogCollection;

class FileLogMetadata extends AbstractMetadata
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
				FileLog::ID_FILE,
				FileLog::ID_LOG,
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
				FileLog::ID_FILE_LOG,
				FileLog::ID_FILE,
				FileLog::ID_LOG,
			)
		);
	}
		
 	/**
 	 *
 	 * Get fields
 	 *
 	 */
	public function getFields() 
	{
		return array(
			FileLog::ID_FILE_LOG,
			FileLog::ID_FILE,
			FileLog::ID_LOG,
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
		return "FileLog";
	}
		
 	/**
 	 *
 	 * Get TableName
 	 *
 	 * @return string
 	 */
	public function getTableName() 
	{
		return "core_files_logs";
	}
		
 	/**
 	 *
 	 * Get PrimaryKey
 	 *
 	 * @return string
 	 */
	public function getPrimaryKey() 
	{
		return "id_file_log";
	}
		
 	/**
 	 *
 	 * Get Factory
 	 *
 	 * @return FileLogFactory
 	 */
	public function getFactory() 
	{
		static $factory = null;
		if( null == $factory ){
			$factory = new FileLogFactory();
		}
		return $factory;
	}
		
 	/**
 	 *
 	 * Get Collection
 	 *
 	 * @return FileLogCollection
 	 */
	public function newCollection() 
	{
		return new FileLogCollection();
	}
		
 	/**
 	 *
 	 * Get Bean
 	 *
 	 * @return FileLog
 	 */
	public function newBean() 
	{
		return new FileLog();
	}
}
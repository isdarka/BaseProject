<?php

/**
 *
 * FileBean
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
use Core\Model\Bean\File;
use Core\Model\Factory\FileFactory;
use Core\Model\Collection\FileCollection;

class FileMetadata extends AbstractMetadata
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
				File::STATUS,
				File::NAME,
				File::TIMESTAMP,
				File::PATH,
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
				File::ID_FILE,
				File::STATUS,
				File::NAME,
				File::TIMESTAMP,
				File::PATH,
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
			File::ID_FILE,
			File::STATUS,
			File::NAME,
			File::TIMESTAMP,
			File::PATH,
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
		return "File";
	}
		
 	/**
 	 *
 	 * Get TableName
 	 *
 	 * @return string
 	 */
	public function getTableName() 
	{
		return "core_files";
	}
		
 	/**
 	 *
 	 * Get PrimaryKey
 	 *
 	 * @return string
 	 */
	public function getPrimaryKey() 
	{
		return "id_file";
	}
		
 	/**
 	 *
 	 * Get Factory
 	 *
 	 * @return FileFactory
 	 */
	public function getFactory() 
	{
		static $factory = null;
		if( null == $factory ){
			$factory = new FileFactory();
		}
		return $factory;
	}
		
 	/**
 	 *
 	 * Get Collection
 	 *
 	 * @return FileCollection
 	 */
	public function newCollection() 
	{
		return new FileCollection();
	}
		
 	/**
 	 *
 	 * Get Bean
 	 *
 	 * @return File
 	 */
	public function newBean() 
	{
		return new File();
	}
}
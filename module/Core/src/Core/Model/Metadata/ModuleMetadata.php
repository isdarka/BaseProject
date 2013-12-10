<?php

/**
 *
 * ModuleBean
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
use Core\Model\Bean\Module;
use Core\Model\Factory\ModuleFactory;
use Core\Model\Collection\ModuleCollection;
use Core\Model\Bean\ModuleBean;

class ModuleMetadata extends AbstractMetadata
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
				ModuleBean::NAME,
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
				ModuleBean::ID_MODULE,
				ModuleBean::NAME,
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
		return "Module";
	}
		
 	/**
 	 *
 	 * Get TableName
 	 *
 	 * @return string
 	 */
	public function getTableName() 
	{
		return "core_modules";
	}
		
 	/**
 	 *
 	 * Get PrimaryKey
 	 *
 	 * @return string
 	 */
	public function getPrimaryKey() 
	{
		return "id_module";
	}
		
 	/**
 	 *
 	 * Get Factory
 	 *
 	 * @return ModuleFactory
 	 */
	public function getFactory() 
	{
		static $factory = null;
		if( null == $factory ){
			$factory = new ModuleFactory();
		}
		return $factory;
	}
		
 	/**
 	 *
 	 * Get Collection
 	 *
 	 * @return ModuleCollection
 	 */
	public function newCollection() 
	{
		return new ModuleCollection();
	}
		
 	/**
 	 *
 	 * Get Bean
 	 *
 	 * @return Module
 	 */
	public function newBean() 
	{
		return new ModuleBean();
	}
}
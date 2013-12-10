<?php

/**
 *
 * ControllerBean
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
use Core\Model\Bean\Controller;
use Core\Model\Factory\ControllerFactory;
use Core\Model\Collection\ControllerCollection;

class ControllerMetadata extends AbstractMetadata
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
				Controller::ID_MODULE,
				Controller::NAME,
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
				Controller::ID_CONTROLLER,
				Controller::ID_MODULE,
				Controller::NAME,
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
		return "Controller";
	}
		
 	/**
 	 *
 	 * Get TableName
 	 *
 	 * @return string
 	 */
	public function getTableName() 
	{
		return "core_controllers";
	}
		
 	/**
 	 *
 	 * Get PrimaryKey
 	 *
 	 * @return string
 	 */
	public function getPrimaryKey() 
	{
		return "id_controller";
	}
		
 	/**
 	 *
 	 * Get Factory
 	 *
 	 * @return ControllerFactory
 	 */
	public function getFactory() 
	{
		static $factory = null;
		if( null == $factory ){
			$factory = new ControllerFactory();
		}
		return $factory;
	}
		
 	/**
 	 *
 	 * Get Collection
 	 *
 	 * @return ControllerCollection
 	 */
	public function newCollection() 
	{
		return new ControllerCollection();
	}
		
 	/**
 	 *
 	 * Get Bean
 	 *
 	 * @return Controller
 	 */
	public function newBean() 
	{
		return new Controller();
	}
}
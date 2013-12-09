<?php
/**
 *
 * @author isdarka
 * @created Nov 24, 2013 6:57:42 PM
 */

namespace Core\Model\Metadata;


use Model\Metadata\AbstractMetadata;
use Model\Bean\AbstractBean;
use Core\Model\Bean\Controller;
use Core\Model\Factory\ControllerFactory;
use Core\Model\Collection\ControllerCollection;

class ControllerMetadata extends AbstractMetadata
{
	/**
	 * 
	 * @param AbstractBean $bean
	 */
	public function toUpdateArray(AbstractBean $bean)
	{
		return $bean->toArrayFor(
				array(
						Controller::NAME,
						Controller::ID_MODULE
				)
		);
	}
	
	/**
	 * 
	 * @return string
	 */
	public function getTableName()
	{
		return "core_controllers";
	}
	
	/**
	 * 
	 * @return string
	 */
	public function getPrimaryKey()
	{
		return 'id_controller';
	}
	
	/**
	 * 
	 * @return string
	 */
	public function getEntityName()
	{
		return "Controller";
	}
	/**
	 * 
	 * @return ModuleFactory
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
	 * @return \Core\Model\Collection\ModuleCollection
	 */
	public function newCollection(){
		return new ControllerCollection();
	}
	
} 
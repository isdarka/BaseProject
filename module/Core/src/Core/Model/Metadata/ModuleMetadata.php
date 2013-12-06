<?php
/**
 *
 * @author isdarka
 * @created Nov 24, 2013 6:57:42 PM
 */

namespace Core\Model\Metadata;

use Model\Interfaces\MetadataInterface;
use Model\Metadata\AbstractMetadata;
use Core\Model\Bean\ModuleBean;
use Model\Bean\AbstractBean;
use Core\Model\Factory\ModuleFactory;
use Core\Model\Collection\ModuleCollection;

class ModuleMetadata extends AbstractMetadata
{
	/**
	 * 
	 * @param AbstractBean $bean
	 */
	public function toUpdateArray(AbstractBean $bean)
	{
		return $bean->toArrayFor(
				array(ModuleBean::NAME)
		);
	}
	
	/**
	 * 
	 * @return string
	 */
	public function getEntityName()
	{
		return "Module";
	}
	/**
	 * 
	 * @return string
	 */
	public function getTableName()
	{
		return "core_modules";
	}
	
	/**
	 * 
	 * @return string
	 */
	public function getPrimaryKey()
	{
		return 'id_module';
	}
	
	/**
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
	 * @return \Core\Model\Collection\ModuleCollection
	 */
	public function newCollection(){
		return new ModuleCollection();
	}
	
} 
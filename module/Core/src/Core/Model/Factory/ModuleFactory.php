<?php

/**
 *
 * ModuleBean
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Factory
 * @copyright 
 * @license 
 * @created Fri Dec 20 17:00:49 2013
 * @version 1.0
 */

namespace Core\Model\Factory;

use Model\Factory\AbstractFactory;
use Core\Model\Exception\ModuleException;
use Core\Model\Bean\ModuleBean;

class ModuleFactory extends AbstractFactory
{

		
 	/**
 	 *
 	 * Create Module from array
 	 *
 	 * @return Module
 	 */
	public static  function createFromArray($fields) 
	{
		$module = new ModuleBean();
		self::populate($module,$fields);
		return $module;
	}
		
 	/**
 	 *
 	 * Populate Module
 	 *
 	 */
	public static  function populate($module, $fields) 
	{
		if(!($module instanceof ModuleBean))
			throw new ModuleException('$module must be instance of ModuleBean');
		
		if($fields instanceof \stdClass)
		{
			$factory = self::getInstance();
			$stdClass = clone $fields;
			$fields = array();
			foreach ($stdClass as $key => $value)
				$fields[$factory->getUnderscore($key)] = $value;
		}
		
		if(isset($fields[ModuleBean::ID_MODULE])){
			$module->setIdModule($fields[ModuleBean::ID_MODULE]);
		}
		
		if(isset($fields[ModuleBean::NAME]) && !empty($fields[ModuleBean::NAME])){
			$module->setName($fields[ModuleBean::NAME]);
		}
		
	}
}
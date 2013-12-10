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
 * @created Mon Dec 9 11:15:21 2013
 * @version 1.0
 */

namespace Core\Model\Factory;

use Core\Model\Bean\Module;
use Model\Factory\AbstractFactory;
use Core\Model\Bean\ModuleBean;
use Core\Model\Exception\ModuleException;

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
		
		if(isset($fields[ModuleBean::ID_MODULE])){
			$module->setIdModule($fields[ModuleBean::ID_MODULE]);
		}
		
		if(isset($fields[ModuleBean::NAME])){
			$module->setName($fields[ModuleBean::NAME]);
		}
		
	}
}
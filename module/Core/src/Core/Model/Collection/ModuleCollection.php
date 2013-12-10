<?php

/**
 *
 * ModuleBean
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Collection
 * @copyright 
 * @license 
 * @created Mon Dec 9 11:45:42 2013
 * @version 1.0
 */

namespace Core\Model\Collection;

use Model\Collection\AbstractCollection;
use Core\Model\Bean\ModuleBean;

class ModuleCollection extends AbstractCollection
{

		
 	/**
 	 *
 	 * @return array
 	 */
	public function toCombo() 
	{
		return $this->map(function(ModuleBean $module){
			return array( $module->getidModule() => $module->getName() );
		});
	}
	
	
	public function getByName($name)
	{
		$moduleBean = null;
		$this->each(function(ModuleBean $module) use ($name, &$moduleBean){
			if($module->getName() == $name){
				$moduleBean = $module;
			}
		});
		return $moduleBean;
	}
}
<?php

/**
 *
 * ControllerBean
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
use Core\Model\Bean\Controller;

class ControllerCollection extends AbstractCollection
{

		
 	/**
 	 *
 	 * Get Ids
 	 *
 	 * @return array
 	 */
	public function getModuleIds() 
	{
		return $this->map(function(Controller $controller){
			return array($controller->getIdModule() => $controller->getIdModule());
		});
	}
		
 	/**
 	 *
 	 * Get Ids
 	 *
 	 * @return ControllerCollection
 	 */
	public function getByIdModule($idModule) 
	{
		$controllerCollection = new ControllerCollection();
		$this->each(function(Controller $controller) use ($idModule, $controllerCollection){
			if($controller->getIdModule() == $idModule)
				$controllerCollection->append($controller);
		});
		return $controllerCollection;
	}
		
 	/**
 	 *
 	 * @return array
 	 */
	public function toCombo() 
	{
		return $this->map(function(Controller $controller){
			return array( $controller->getidController() => $controller->getName() );
		});
	}
	
	public function getByName($name)
	{
		$moduleBean = null;
		$this->each(function(Controller $module) use ($name, &$moduleBean){
			if($module->getName() == $name){
				$moduleBean = $module;
			}
		});
		return $moduleBean;
	}
}
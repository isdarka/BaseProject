<?php

/**
 *
 * ControllerBean
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

use Core\Model\Bean\Controller;
use Model\Factory\AbstractFactory;

class ControllerFactory extends AbstractFactory
{

		
 	/**
 	 *
 	 * Create Controller from array
 	 *
 	 * @return Controller
 	 */
	public static  function createFromArray($fields) 
	{
		$controller = new Controller();
		self::populate($controller,$fields);
		return $controller;
	}
		
 	/**
 	 *
 	 * Populate Controller
 	 *
 	 */
	public static  function populate($controller, $fields) 
	{
		if(!($controller instanceof Controller))
			throw new ActionException('$controller must be instance of Controller');
		
		if(isset($fields[Controller::ID_CONTROLLER])){
			$controller->setIdController($fields[Controller::ID_CONTROLLER]);
		}
		
		if(isset($fields[Controller::ID_MODULE])){
			$controller->setIdModule($fields[Controller::ID_MODULE]);
		}
		
		if(isset($fields[Controller::NAME])){
			$controller->setName($fields[Controller::NAME]);
		}
		
	}
}
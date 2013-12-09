<?php
/**
 *
 * @author isdarka
 * @created Nov 26, 2013 3:43:47 PM
 */

namespace Core\Model\Factory;

use Model\Factory\AbstractFactory;
use Core\Model\Bean\Controller;
class ControllerFactory extends AbstractFactory
{
	public static function createFromArray($fields)
	{
		$controller = new Controller();
		self::populate($controller, $fields);
		return $controller;
	}
	
	public static function populate($controller, $fields)
	{
		if( !($controller instanceof Controller) )
			throw new UserException('$controller must be instance of Controller');
	
		if( isset($fields[Controller::ID_CONTROLLER]) ){
			$controller->setIdController($fields[Controller::ID_CONTROLLER]);
		}
		
		if( isset($fields[Controller::ID_MODULE]) ){
			$controller->setIdModule($fields[Controller::ID_MODULE]);
		}
		
		if( isset($fields[Controller::NAME]) ){
			$controller->setName($fields[Controller::NAME]);
		}
		
	}
}
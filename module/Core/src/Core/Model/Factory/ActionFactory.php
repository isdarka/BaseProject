<?php

/**
 *
 * ActionBean
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

use Core\Model\Bean\Action;
use Model\Factory\AbstractFactory;
use Core\Model\Exception\ActionException;

class ActionFactory extends AbstractFactory
{

		
 	/**
 	 *
 	 * Create Action from array
 	 *
 	 * @return Action
 	 */
	public static  function createFromArray($fields) 
	{
		$action = new Action();
		self::populate($action,$fields);
		return $action;
	}
		
 	/**
 	 *
 	 * Populate Action
 	 *
 	 */
	public static  function populate($action, $fields) 
	{
		if(!($action instanceof Action))
			throw new ActionException('$action must be instance of Action');
		
		if($fields instanceof \stdClass)
		{
			$factory = self::getInstance();
			$stdClass = clone $fields;
			$fields = array();
			foreach ($stdClass as $key => $value)
				$fields[$factory->getUnderscore($key)] = $value;
		}
		
		if(isset($fields[Action::ID_ACTION])){
			$action->setIdAction($fields[Action::ID_ACTION]);
		}
		
		if(isset($fields[Action::ID_CONTROLLER])){
			$action->setIdController($fields[Action::ID_CONTROLLER]);
		}
		
		if(isset($fields[Action::NAME]) && !empty($fields[Action::NAME])){
			$action->setName($fields[Action::NAME]);
		}
		
	}
}
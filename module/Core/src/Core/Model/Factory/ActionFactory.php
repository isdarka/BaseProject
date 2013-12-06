<?php
/**
 *
 * @author isdarka
 * @created Nov 26, 2013 3:43:47 PM
 */

namespace Core\Model\Factory;

use Model\Factory\AbstractFactory;
use Core\Model\Bean\Action;
use Core\Model\Exception\ActionException;
class ActionFactory extends AbstractFactory
{
	public static function createFromArray($fields)
	{
		$action = new Action();
		self::populate($action, $fields);
		return $action;
	}
	
	public static function populate($action, $fields)
	{
		if( !($action instanceof Action) )
			throw new ActionException('$action must be instance of Action');
	
		if( isset($fields[Action::ID_ACTION]) ){
			$action->setIdAction($fields[Action::ID_ACTION]);
		}
		
		if( isset($fields[Action::ID_CONTROLLER]) ){
			$action->setIdController($fields[Action::ID_CONTROLLER]);
		}
		
		if( isset($fields[Action::NAME]) ){
			$action->setName($fields[Action::NAME]);
		}
		
	}
}
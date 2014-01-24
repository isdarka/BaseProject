<?php

/**
 *
 * MenuItemLogBean
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

use Core\Model\Bean\MenuItemLog;
use Core\Model\Exception\MenuItemLogException;

class MenuItemLogFactory extends LogFactory
{

		
 	/**
 	 *
 	 * Create MenuItemLog from array
 	 *
 	 * @return MenuItemLog
 	 */
	public static  function createFromArray($fields) 
	{
		$menuItemLog = new MenuItemLog();
		self::populate($menuItemLog,$fields);
		return $menuItemLog;
	}
		
 	/**
 	 *
 	 * Populate MenuItemLog
 	 *
 	 */
	public static  function populate($menuItemLog, $fields) 
	{
		parent::populate($menuItemLog, $fields);
		if(!($menuItemLog instanceof MenuItemLog))
			throw new MenuItemLogException('$menuItemLog must be instance of MenuItemLog');
		
		if($fields instanceof \stdClass)
		{
			$factory = self::getInstance();
			$stdClass = clone $fields;
			$fields = array();
			foreach ($stdClass as $key => $value)
				$fields[$factory->getUnderscore($key)] = $value;
		}
		
		if(isset($fields[MenuItemLog::ID_MENU_ITEM_LOG])){
			$menuItemLog->setIdMenuItemLog($fields[MenuItemLog::ID_MENU_ITEM_LOG]);
		}
		
		if(isset($fields[MenuItemLog::ID_MENU_ITEM])){
			$menuItemLog->setIdMenuItem($fields[MenuItemLog::ID_MENU_ITEM]);
		}
		
		if(isset($fields[MenuItemLog::ID_LOG])){
			$menuItemLog->setIdLog($fields[MenuItemLog::ID_LOG]);
		}
		
	}
}
<?php

/**
 *
 * MenuItemBean
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

use Core\Model\Bean\MenuItem;
use Model\Factory\AbstractFactory;
use Core\Model\Exception\MenuItemException;

class MenuItemFactory extends AbstractFactory
{

		
 	/**
 	 *
 	 * Create MenuItem from array
 	 *
 	 * @return MenuItem
 	 */
	public static  function createFromArray($fields) 
	{
		$menuItem = new MenuItem();
		self::populate($menuItem,$fields);
		return $menuItem;
	}
		
 	/**
 	 *
 	 * Populate MenuItem
 	 *
 	 */
	public static  function populate($menuItem, $fields) 
	{
		if(!($menuItem instanceof MenuItem))
			throw new MenuItemException('$menuItem must be instance of MenuItem');
		
		if($fields instanceof \stdClass)
		{
			$factory = self::getInstance();
			$stdClass = clone $fields;
			$fields = array();
			foreach ($stdClass as $key => $value)
				$fields[$factory->getUnderscore($key)] = $value;
		}
		
		if(isset($fields[MenuItem::ID_MENU_ITEM])){
			$menuItem->setIdMenuItem($fields[MenuItem::ID_MENU_ITEM]);
		}
		
		if(isset($fields[MenuItem::ID_ACTION]) && !empty($fields[MenuItem::ID_ACTION])){
			$menuItem->setIdAction($fields[MenuItem::ID_ACTION]);
		}
		
		if(isset($fields[MenuItem::ID_PARENT]) && !empty($fields[MenuItem::ID_PARENT])){
			$menuItem->setIdParent($fields[MenuItem::ID_PARENT]);
		}
		
		if(isset($fields[MenuItem::NAME]) && !empty($fields[MenuItem::NAME])){
			$menuItem->setName($fields[MenuItem::NAME]);
		}
		
		if(isset($fields[MenuItem::ORDER]) && !empty($fields[MenuItem::ORDER])){
			$menuItem->setOrder($fields[MenuItem::ORDER]);
		}
		
		if(isset($fields[MenuItem::STATUS])){
			$menuItem->setStatus($fields[MenuItem::STATUS]);
		}
		
	}
}
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
 * @created Sun Dec 8 22:25:31 2013
 * @version 1.0
 */

namespace Core\Model\Factory;

use Core\Model\Bean\MenuItem;
use Model\Factory\AbstractFactory;

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
			throw new ActionException('$menuItem must be instance of MenuItem');
		
		if(isset($fields[MenuItem::ID_MENU_ITEM])){
			$menuItem->setIdMenuItem($fields[MenuItem::ID_MENU_ITEM]);
		}
		
		if(isset($fields[MenuItem::ID_ACTION])){
			$menuItem->setIdAction($fields[MenuItem::ID_ACTION]);
		}
		
		if(isset($fields[MenuItem::ID_PARENT])){
			$menuItem->setIdParent($fields[MenuItem::ID_PARENT]);
		}
		
		if(isset($fields[MenuItem::NAME])){
			$menuItem->setName($fields[MenuItem::NAME]);
		}
		
		if(isset($fields[MenuItem::ORDER])){
			$menuItem->setOrder($fields[MenuItem::ORDER]);
		}
		
		if(isset($fields[MenuItem::STATUS])){
			$menuItem->setStatus($fields[MenuItem::STATUS]);
		}
		
	}
}
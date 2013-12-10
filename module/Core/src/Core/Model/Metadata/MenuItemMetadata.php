<?php

/**
 *
 * MenuItemBean
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Metadata
 * @copyright 
 * @license 
 * @created Mon Dec 9 11:22:30 2013
 * @version 1.0
 */

namespace Core\Model\Metadata;

use Model\Bean\AbstractBean;
use Model\Metadata\AbstractMetadata;
use Core\Model\Bean\MenuItem;
use Core\Model\Factory\MenuItemFactory;
use Core\Model\Collection\MenuItemCollection;

class MenuItemMetadata extends AbstractMetadata
{

		
 	/**
 	 *
 	 * toUpdateArray
 	 *
 	 */
	public function toUpdateArray(AbstractBean $bean) 
	{
		return $bean->toArrayFor(
			array(
				MenuItem::ID_ACTION,
				MenuItem::ID_PARENT,
				MenuItem::NAME,
				MenuItem::ORDER,
				MenuItem::STATUS,
			)
		);
	}
		
 	/**
 	 *
 	 * toCreateArray
 	 *
 	 */
	public function toCreateArray(AbstractBean $bean) 
	{
		return $bean->toArrayFor(
			array(
				MenuItem::ID_MENU_ITEM,
				MenuItem::ID_ACTION,
				MenuItem::ID_PARENT,
				MenuItem::NAME,
				MenuItem::ORDER,
				MenuItem::STATUS,
			)
		);
	}
	
	
	/**
	 *
	 * toCreateArray
	 *
	 */
	public function getFields()
	{
		return array(
						MenuItem::ID_MENU_ITEM,
						MenuItem::ID_ACTION,
						MenuItem::ID_PARENT,
						MenuItem::NAME,
						MenuItem::ORDER,
						MenuItem::STATUS,
			);
	}
		
 	/**
 	 *
 	 * Get Entity Name
 	 *
 	 * @return string
 	 */
	public function getEntityName() 
	{
		return "MenuItem";
	}
		
 	/**
 	 *
 	 * Get TableName
 	 *
 	 * @return string
 	 */
	public function getTableName() 
	{
		return "core_menu_items";
	}
		
 	/**
 	 *
 	 * Get PrimaryKey
 	 *
 	 * @return string
 	 */
	public function getPrimaryKey() 
	{
		return "id_menu_item";
	}
		
 	/**
 	 *
 	 * Get Factory
 	 *
 	 * @return MenuItemFactory
 	 */
	public function getFactory() 
	{
		static $factory = null;
		if( null == $factory ){
			$factory = new MenuItemFactory();
		}
		return $factory;
	}
		
 	/**
 	 *
 	 * Get Collection
 	 *
 	 * @return MenuItemCollection
 	 */
	public function newCollection() 
	{
		return new MenuItemCollection();
	}
		
 	/**
 	 *
 	 * Get Bean
 	 *
 	 * @return MenuItem
 	 */
	public function newBean() 
	{
		return new MenuItem();
	}
}
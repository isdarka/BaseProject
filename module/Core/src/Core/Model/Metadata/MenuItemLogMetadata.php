<?php

/**
 *
 * MenuItemLogBean
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
use Core\Model\Bean\MenuItemLog;
use Core\Model\Factory\MenuItemLogFactory;
use Core\Model\Collection\MenuItemLogCollection;

class MenuItemLogMetadata extends AbstractMetadata
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
				MenuItemLog::ID_MENU_ITEM,
				MenuItemLog::ID_LOG,
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
				MenuItemLog::ID_MENU_ITEM_LOG,
				MenuItemLog::ID_MENU_ITEM,
				MenuItemLog::ID_LOG,
			)
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
		return "MenuItemLog";
	}
		
 	/**
 	 *
 	 * Get TableName
 	 *
 	 * @return string
 	 */
	public function getTableName() 
	{
		return "core_menu_item_logs";
	}
		
 	/**
 	 *
 	 * Get PrimaryKey
 	 *
 	 * @return string
 	 */
	public function getPrimaryKey() 
	{
		return "id_menu_item_log";
	}
		
 	/**
 	 *
 	 * Get Factory
 	 *
 	 * @return MenuItemLogFactory
 	 */
	public function getFactory() 
	{
		static $factory = null;
		if( null == $factory ){
			$factory = new MenuItemLogFactory();
		}
		return $factory;
	}
		
 	/**
 	 *
 	 * Get Collection
 	 *
 	 * @return MenuItemLogCollection
 	 */
	public function newCollection() 
	{
		return new MenuItemLogCollection();
	}
		
 	/**
 	 *
 	 * Get Bean
 	 *
 	 * @return MenuItemLog
 	 */
	public function newBean() 
	{
		return new MenuItemLog();
	}
}
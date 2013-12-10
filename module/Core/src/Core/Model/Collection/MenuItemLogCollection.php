<?php

/**
 *
 * MenuItemLogBean
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


class MenuItemLogCollection extends LogCollection
{

		
 	/**
 	 *
 	 * Get Ids
 	 *
 	 * @return array
 	 */
	public function getMenuItemIds() 
	{
		return $this->map(function(MenuItemLog $menuItemLog){
			return array($menuItemLog->getIdMenuItem() => $action->getIdMenuItem());
		});
	}
		
 	/**
 	 *
 	 * Get Ids
 	 *
 	 * @return MenuItemLogCollection
 	 */
	public function getByIdMenuItem($idMenuItem) 
	{
		$menuItemLogCollection = new MenuItemLogCollection();
		$this->each(function(MenuItemLog $menuItemLog) use ($idMenuItem, $menuItemLogCollection){
			if($menuItemLog->getIdMenuItem() == $idMenuItem)
				$menuItemLogCollection->append($menuItemLog);
		});
		return $menuItemLogCollection;
	}
		
 	/**
 	 *
 	 * Get Ids
 	 *
 	 * @return array
 	 */
	public function getLogIds() 
	{
		return $this->map(function(MenuItemLog $menuItemLog){
			return array($menuItemLog->getIdLog() => $action->getIdLog());
		});
	}
		
 	/**
 	 *
 	 * Get Ids
 	 *
 	 * @return MenuItemLogCollection
 	 */
	public function getByIdLog($idLog) 
	{
		$menuItemLogCollection = new MenuItemLogCollection();
		$this->each(function(MenuItemLog $menuItemLog) use ($idLog, $menuItemLogCollection){
			if($menuItemLog->getIdLog() == $idLog)
				$menuItemLogCollection->append($menuItemLog);
		});
		return $menuItemLogCollection;
	}
}
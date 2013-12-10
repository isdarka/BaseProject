<?php

/**
 *
 * MenuItemBean
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

use Model\Collection\AbstractCollection;
use Core\Model\Bean\MenuItem;

class MenuItemCollection extends AbstractCollection
{

		
 	/**
 	 *
 	 * Get Ids
 	 *
 	 * @return array
 	 */
	public function getActionIds() 
	{
		return $this->map(function(MenuItem $menuItem){
			return array($menuItem->getIdAction() => $action->getIdAction());
		});
	}
		
 	/**
 	 *
 	 * Get Ids
 	 *
 	 * @return MenuItemCollection
 	 */
	public function getByIdAction($idAction) 
	{
		$menuItemCollection = new MenuItemCollection();
		$this->each(function(MenuItem $menuItem) use ($idAction, $menuItemCollection){
			if($menuItem->getIdAction() == $idAction)
				$menuItemCollection->append($menuItem);
		});
		return $menuItemCollection;
	}
		
 	/**
 	 *
 	 * Get Ids
 	 *
 	 * @return array
 	 */
	public function getParentIds() 
	{
		return $this->map(function(MenuItem $menuItem){
			return array($menuItem->getIdParent() => $action->getIdParent());
		});
	}
		
 	/**
 	 *
 	 * Get Ids
 	 *
 	 * @return MenuItemCollection
 	 */
	public function getByIdParent($idParent) 
	{
		$menuItemCollection = new MenuItemCollection();
		$this->each(function(MenuItem $menuItem) use ($idParent, $menuItemCollection){
			if($menuItem->getIdParent() == $idParent)
				$menuItemCollection->append($menuItem);
		});
		return $menuItemCollection;
	}
		
 	/**
 	 *
 	 * @return array
 	 */
	public function toCombo() 
	{
		return $this->map(function(MenuItem $menuItem){
			return array( $menuItem->getidMenuItem() => $menuItem->getName() );
		});
	}
}
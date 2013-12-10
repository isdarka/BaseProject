<?php

/**
 *
 * MenuItemCatalog
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Catalog
 * @copyright 
 * @license 
 * @created Mon Dec 9 11:15:21 2013
 * @version 1.0
 */

namespace Core\Model\Catalog;

use Model\Bean\AbstractBean;
use Core\Model\Metadata\MenuItemMetadata;
use Core\Model\Exception\MenuItemException;
use Zend\Db\Sql\Where;
use Model\Catalog\AbstractCatalog;

class MenuItemCatalog extends AbstractCatalog
{

		
 	/**
 	 *
 	 * Get MenuItemMetadata
 	 *
 	 * @return MenuItemMetadata
 	 */
	public function getMetadata() 
	{
		return new MenuItemMetadata();
	}
}
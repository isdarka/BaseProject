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
 * @created Sun Dec 8 22:25:31 2013
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
<?php

/**
 *
 * ModuleCatalog
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
use Core\Model\Metadata\ModuleMetadata;
use Core\Model\Exception\ModuleException;
use Zend\Db\Sql\Where;
use Model\Catalog\AbstractCatalog;

class ModuleCatalog extends AbstractCatalog
{

		
 	/**
 	 *
 	 * Get ModuleMetadata
 	 *
 	 * @return ModuleMetadata
 	 */
	public function getMetadata() 
	{
		return new ModuleMetadata();
	}
}
<?php

/**
 *
 * RoleCatalog
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Catalog
 * @copyright 
 * @license 
 * @created Sun Dec 8 19:21:50 2013
 * @version 1.0
 */

namespace Core\Model\Catalog;

use Model\Bean\AbstractBean;
use Core\Model\Metadata\RoleMetadata;
use Core\Model\Exception\RoleException;
use Zend\Db\Sql\Where;
use Model\Catalog\AbstractCatalog;

class RoleCatalog extends AbstractCatalog
{

		
 	/**
 	 *
 	 * Get RoleMetadata
 	 *
 	 * @return RoleMetadata
 	 */
	public function getMetadata() 
	{
		return new RoleMetadata();
	}
}
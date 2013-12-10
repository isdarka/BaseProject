<?php

/**
 *
 * ControllerCatalog
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
use Core\Model\Metadata\ControllerMetadata;
use Core\Model\Exception\ControllerException;
use Zend\Db\Sql\Where;
use Model\Catalog\AbstractCatalog;

class ControllerCatalog extends AbstractCatalog
{

		
 	/**
 	 *
 	 * Get ControllerMetadata
 	 *
 	 * @return ControllerMetadata
 	 */
	public function getMetadata() 
	{
		return new ControllerMetadata();
	}
}
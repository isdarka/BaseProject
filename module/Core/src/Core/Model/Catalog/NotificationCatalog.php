<?php

/**
 *
 * NotificationCatalog
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Catalog
 * @copyright 
 * @license 
 * @created Fri Jan 31 09:48:50 2014
 * @version 1.0
 */

namespace Core\Model\Catalog;

use Model\Bean\AbstractBean;
use Core\Model\Metadata\NotificationMetadata;
use Core\Model\Exception\NotificationException;
use Zend\Db\Sql\Where;
use Model\Catalog\AbstractCatalog;

class NotificationCatalog extends AbstractCatalog
{

		
 	/**
 	 *
 	 * Get NotificationMetadata
 	 *
 	 * @return NotificationMetadata
 	 */
	public function getMetadata() 
	{
		return new NotificationMetadata();
	}
}
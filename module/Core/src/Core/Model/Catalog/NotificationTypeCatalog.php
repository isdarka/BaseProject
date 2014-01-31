<?php

/**
 *
 * NotificationTypeCatalog
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
use Core\Model\Metadata\NotificationTypeMetadata;
use Core\Model\Exception\NotificationTypeException;
use Zend\Db\Sql\Where;
use Model\Catalog\AbstractCatalog;

class NotificationTypeCatalog extends AbstractCatalog
{

		
 	/**
 	 *
 	 * Get NotificationTypeMetadata
 	 *
 	 * @return NotificationTypeMetadata
 	 */
	public function getMetadata() 
	{
		return new NotificationTypeMetadata();
	}
}
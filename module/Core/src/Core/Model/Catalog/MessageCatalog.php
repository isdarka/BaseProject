<?php

/**
 *
 * MessageCatalog
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Catalog
 * @copyright 
 * @license 
 * @created Wed Jan 29 11:40:44 2014
 * @version 1.0
 */

namespace Core\Model\Catalog;

use Model\Bean\AbstractBean;
use Core\Model\Metadata\MessageMetadata;
use Core\Model\Exception\MessageException;
use Zend\Db\Sql\Where;
use Model\Catalog\AbstractCatalog;

class MessageCatalog extends AbstractCatalog
{

		
 	/**
 	 *
 	 * Get MessageMetadata
 	 *
 	 * @return MessageMetadata
 	 */
	public function getMetadata() 
	{
		return new MessageMetadata();
	}
}
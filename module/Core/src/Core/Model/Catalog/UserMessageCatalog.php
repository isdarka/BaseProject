<?php

/**
 *
 * UserMessageCatalog
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Catalog
 * @copyright 
 * @license 
 * @created Wed Jan 29 14:40:50 2014
 * @version 1.0
 */

namespace Core\Model\Catalog;

use Model\Bean\AbstractBean;
use Core\Model\Metadata\UserMessageMetadata;
use Core\Model\Exception\UserMessageException;
use Zend\Db\Sql\Where;
use Model\Catalog\AbstractCatalog;

class UserMessageCatalog extends AbstractCatalog
{

		
 	/**
 	 *
 	 * Get UserMessageMetadata
 	 *
 	 * @return UserMessageMetadata
 	 */
	public function getMetadata() 
	{
		return new UserMessageMetadata();
	}
}
<?php

/**
 *
 * AddressCatalog
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Catalog
 * @copyright 
 * @license 
 * @created Wed Dec 11 09:48:20 2013
 * @version 1.0
 */

namespace Core\Model\Catalog;

use Model\Bean\AbstractBean;
use Core\Model\Metadata\AddressMetadata;
use Core\Model\Exception\AddressException;
use Zend\Db\Sql\Where;
use Model\Catalog\AbstractCatalog;

class AddressCatalog extends AbstractCatalog
{

		
 	/**
 	 *
 	 * Get AddressMetadata
 	 *
 	 * @return AddressMetadata
 	 */
	public function getMetadata() 
	{
		return new AddressMetadata();
	}
}
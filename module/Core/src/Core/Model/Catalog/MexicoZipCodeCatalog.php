<?php

/**
 *
 * MexicoZipCodeCatalog
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Catalog
 * @copyright 
 * @license 
 * @created Fri Dec 13 09:35:16 2013
 * @version 1.0
 */

namespace Core\Model\Catalog;

use Model\Bean\AbstractBean;
use Core\Model\Metadata\MexicoZipCodeMetadata;
use Core\Model\Exception\MexicoZipCodeException;
use Zend\Db\Sql\Where;
use Model\Catalog\AbstractCatalog;

class MexicoZipCodeCatalog extends AbstractCatalog
{

		
 	/**
 	 *
 	 * Get MexicoZipCodeMetadata
 	 *
 	 * @return MexicoZipCodeMetadata
 	 */
	public function getMetadata() 
	{
		return new MexicoZipCodeMetadata();
	}
}
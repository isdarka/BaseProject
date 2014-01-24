<?php

/**
 *
 * MexicoZipCodeQuery
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Query
 * @copyright 
 * @license 
 * @created Fri Dec 13 09:35:16 2013
 * @version 1.0
 */

namespace Core\Query;

use Query\Query;
use Core\Model\Metadata\MexicoZipCodeMetadata;

class MexicoZipCodeQuery extends Query
{

		
 	/**
 	 *
 	 * Contruct MexicoZipCodeQuery
 	 *
 	 */
	public function __construct($adapter) 
	{
		$this->metadata = new MexicoZipCodeMetadata();
		parent::__construct($adapter, $this->metadata->getTableName(), $this->metadata->getEntityName());
	}
}
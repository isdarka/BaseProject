<?php

/**
 *
 * AddressQuery
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Query
 * @copyright 
 * @license 
 * @created Wed Dec 11 09:48:20 2013
 * @version 1.0
 */

namespace Core\Query;

use Query\Query;
use Core\Model\Metadata\AddressMetadata;

class AddressQuery extends Query
{

		
 	/**
 	 *
 	 * Contruct AddressQuery
 	 *
 	 */
	public function __construct($adapter) 
	{
		$this->metadata = new AddressMetadata();
		parent::__construct($adapter, $this->metadata->getTableName(), $this->metadata->getEntityName());
	}
}
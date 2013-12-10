<?php

/**
 *
 * PersonQuery
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Query
 * @copyright 
 * @license 
 * @created Mon Dec 9 11:22:30 2013
 * @version 1.0
 */

namespace Core\Query;

use Query\Query;
use Core\Model\Metadata\PersonMetadata;

class PersonQuery extends Query
{

		
 	/**
 	 *
 	 * Contruct PersonQuery
 	 *
 	 */
	public function __construct($adapter) 
	{
		$this->metadata = new PersonMetadata();
		parent::__construct($adapter, $this->metadata->getTableName(), $this->metadata->getEntityName());
	}
}
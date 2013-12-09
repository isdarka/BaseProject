<?php

/**
 *
 * RoleQuery
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Query
 * @copyright 
 * @license 
 * @created Sun Dec 8 19:21:50 2013
 * @version 1.0
 */

namespace Core\Query;

use Query\Query;
use Core\Model\Metadata\RoleMetadata;

class RoleQuery extends Query
{

		
 	/**
 	 *
 	 * Contruct RoleQuery
 	 *
 	 */
	public function __construct($adapter) 
	{
		$this->metadata = new RoleMetadata();
		parent::__construct($adapter, $this->metadata->getTableName(), $this->metadata->getEntityName());
	}
}
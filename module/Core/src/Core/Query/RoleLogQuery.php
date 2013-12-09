<?php

/**
 *
 * RoleLogQuery
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
use Core\Model\Metadata\RoleLogMetadata;
use Core\Model\Bean\Log;

class RoleLogQuery extends Query
{

		
 	/**
 	 *
 	 * Contruct RoleLogQuery
 	 *
 	 */
	public function __construct($adapter) 
	{
		$this->metadata = new RoleLogMetadata();
		parent::__construct($adapter, $this->metadata->getTableName(), $this->metadata->getEntityName());
		$this->innerJoin(new Log());
	}
}
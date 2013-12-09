<?php

/**
 *
 * LogQuery
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Query
 * @copyright 
 * @license 
 * @created Sun Dec 8 14:36:08 2013
 * @version 1.0
 */

namespace Core\Query;

use Query\Query;
use Core\Model\Metadata\LogMetadata;

class LogQuery extends Query
{

		
 	/**
 	 *
 	 * Contruct LogQuery
 	 *
 	 */
	public function __construct($adapter) 
	{
		$this->metadata = new LogMetadata();
		parent::__construct($adapter, $this->metadata->getTableName(), $this->metadata->getEntityName());
	}
}
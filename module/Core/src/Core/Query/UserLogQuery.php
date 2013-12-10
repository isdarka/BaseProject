<?php

/**
 *
 * UserLogQuery
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
use Core\Model\Metadata\UserLogMetadata;
use Core\Model\Bean\Log;

class UserLogQuery extends Query
{

		
 	/**
 	 *
 	 * Contruct UserLogQuery
 	 *
 	 */
	public function __construct($adapter) 
	{
		$this->metadata = new UserLogMetadata();
		parent::__construct($adapter, $this->metadata->getTableName(), $this->metadata->getEntityName());
		$this->innerJoin(new Log());
	}
}
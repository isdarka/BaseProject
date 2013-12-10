<?php

/**
 *
 * UserQuery
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
use Core\Model\Metadata\UserMetadata;
use Core\Model\Bean\Person;

class UserQuery extends Query
{

		
 	/**
 	 *
 	 * Contruct UserQuery
 	 *
 	 */
	public function __construct($adapter) 
	{
		$this->metadata = new UserMetadata();
		parent::__construct($adapter, $this->metadata->getTableName(), $this->metadata->getEntityName());
		$this->innerJoin(new Person());
	}
}
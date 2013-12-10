<?php

/**
 *
 * ActionQuery
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
use Core\Model\Metadata\ActionMetadata;
use Core\Model\Metadata\RoleMetadata;

class ActionQuery extends Query
{

		
 	/**
 	 *
 	 * Contruct ActionQuery
 	 *
 	 */
	public function __construct($adapter) 
	{
		$this->metadata = new ActionMetadata();
		parent::__construct($adapter, $this->metadata->getTableName(), $this->metadata->getEntityName());
	}
	
	/**
 	 *
 	 * Inner Join Role
 	 *
 	 */
	public function innerJoinRole() 
	{
		$this->join("core_actions_roles",
			"core_actions_roles.".$this->metadata->getPrimaryKey()."=".
			$this->metadata->getEntityName().".".$this->metadata->getPrimaryKey());
		return $this;
	}
}
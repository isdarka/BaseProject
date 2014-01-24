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
 * @created Mon Dec 9 11:22:30 2013
 * @version 1.0
 */

namespace Core\Query;

use Query\Query;
use Core\Model\Metadata\RoleMetadata;
use Core\Model\Bean\Role;

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
	
	public function enables()
	{
		$this->whereAdd(Role::STATUS, Role::ENABLE);
		return $this;	
	}
	
	public function innerJoinAction()
	{
		$this->join("core_actions_roles",
				"core_actions_roles.".$this->metadata->getPrimaryKey()."=".
				$this->metadata->getEntityName().".".$this->metadata->getPrimaryKey());
	
		return $this;
	}
}
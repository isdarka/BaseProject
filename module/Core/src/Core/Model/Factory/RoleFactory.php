<?php

/**
 *
 * RoleBean
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Factory
 * @copyright 
 * @license 
 * @created Fri Dec 20 17:00:49 2013
 * @version 1.0
 */

namespace Core\Model\Factory;

use Core\Model\Bean\Role;
use Model\Factory\AbstractFactory;
use Core\Model\Exception\RoleException;

class RoleFactory extends AbstractFactory
{

		
 	/**
 	 *
 	 * Create Role from array
 	 *
 	 * @return Role
 	 */
	public static  function createFromArray($fields) 
	{
		$role = new Role();
		self::populate($role,$fields);
		return $role;
	}
		
 	/**
 	 *
 	 * Populate Role
 	 *
 	 */
	public static  function populate($role, $fields) 
	{
		if(!($role instanceof Role))
			throw new RoleException('$role must be instance of Role');
		
		if($fields instanceof \stdClass)
		{
			$factory = self::getInstance();
			$stdClass = clone $fields;
			$fields = array();
			foreach ($stdClass as $key => $value)
				$fields[$factory->getUnderscore($key)] = $value;
		}
		
		if(isset($fields[Role::ID_ROLE])){
			$role->setIdRole($fields[Role::ID_ROLE]);
		}
		
		if(isset($fields[Role::NAME])){
			$role->setName($fields[Role::NAME]);
		}
		
		if(isset($fields[Role::STATUS])){
			$role->setStatus($fields[Role::STATUS]);
		}
		
	}
}
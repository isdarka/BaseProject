<?php
/**
 *
 * @author isdarka
 * @created Nov 26, 2013 3:43:47 PM
 */

namespace Core\Model\Factory;

use Model\Factory\AbstractFactory;
use Core\Model\Bean\Role;
class RoleFactory extends AbstractFactory
{
	public static function createFromArray($fields)
	{
		$role = new Role();
		self::populate($role, $fields);
		return $role;
	}
	
	public static function populate($role, $fields)
	{
		if( !($role instanceof Role) )
			throw new ActionException('$role must be instance of Role');
	
		if( isset($fields[Role::ID_ROLE]) ){
			$role->setIdRole($fields[Role::ID_ROLE]);
		}
		
		if( isset($fields[Role::NAME]) ){
			$role->setName($fields[Role::NAME]);
		}
		
		if( isset($fields[Role::STATUS]) ){
			$role->setStatus($fields[Role::STATUS]);
		}
		
		
	}
}
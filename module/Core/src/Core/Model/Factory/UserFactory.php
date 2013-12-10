<?php

/**
 *
 * UserBean
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Factory
 * @copyright 
 * @license 
 * @created Mon Dec 9 11:15:21 2013
 * @version 1.0
 */

namespace Core\Model\Factory;

use Core\Model\Bean\User;
use Core\Model\Factory\PersonFactory;

class UserFactory extends PersonFactory
{

		
 	/**
 	 *
 	 * Create User from array
 	 *
 	 * @return User
 	 */
	public static  function createFromArray($fields) 
	{
		$user = new User();
		self::populate($user,$fields);
		return $user;
	}
		
 	/**
 	 *
 	 * Populate User
 	 *
 	 */
	public static  function populate($user, $fields) 
	{
		parent::populate($user, $fields);
		if(!($user instanceof User))
			throw new ActionException('$user must be instance of User');
		
		if(isset($fields[User::ID_USER])){
			$user->setIdUser($fields[User::ID_USER]);
		}
		
		if(isset($fields[User::STATUS])){
			$user->setStatus($fields[User::STATUS]);
		}
		
		if(isset($fields[User::ID_PERSON])){
			$user->setIdPerson($fields[User::ID_PERSON]);
		}
		
		if(isset($fields[User::ID_ROLE])){
			$user->setIdRole($fields[User::ID_ROLE]);
		}
		
		if(isset($fields[User::USERNAME])){
			$user->setUsername($fields[User::USERNAME]);
		}
		
		if(isset($fields[User::PASSWORD])){
			$user->setPassword($fields[User::PASSWORD]);
		}
		
	}
}
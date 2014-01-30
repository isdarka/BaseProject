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
 * @created Fri Dec 20 17:00:49 2013
 * @version 1.0
 */

namespace Core\Model\Factory;

use Core\Model\Bean\User;
use Core\Model\Exception\UserException;

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
			throw new UserException('$user must be instance of User');
		
		if($fields instanceof \stdClass)
		{
			$factory = self::getInstance();
			$stdClass = clone $fields;
			$fields = array();
			foreach ($stdClass as $key => $value)
				$fields[$factory->getUnderscore($key)] = $value;
		}
		
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
		
		if(isset($fields[User::ID_FILE]) && !empty($fields[User::ID_FILE])){
			$user->setIdFile($fields[User::ID_FILE]);
		}
		
		if(isset($fields[User::USERNAME]) && !empty($fields[User::USERNAME])){
			$user->setUsername($fields[User::USERNAME]);
		}
		
		if(isset($fields[User::PASSWORD]) && !empty($fields[User::PASSWORD])){
			$user->setPassword($fields[User::PASSWORD]);
		}
		
	}
}
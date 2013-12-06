<?php
/**
 *
 * @author isdarka
 * @created Nov 26, 2013 3:35:15 PM
 */
namespace Core\Model\Factory;

use Model\Factory\AbstractFactory;
use Core\Model\Bean\User;
use Core\Model\Exception\UserException;

class UserFactory extends PersonFactory
{
	public static function createFromArray($fields)
	{
		$user = new User();
		self::populate($user, $fields);
		return $user;
	}
	
	public static function populate($user, $fields)
	{
		parent::populate($user, $fields);
		if( !($user instanceof User) )
			throw new UserException('$user must be instance of User');
	
		if( isset($fields[User::ID_USER]) ){
			$user->setIdUser($fields[User::ID_USER]);
		}
		if( isset($fields[User::ID_PERSON]) ){
			$user->setIdPerson($fields[User::ID_PERSON]);
		}
		if( isset($fields[User::USERNAME]) ){
			$user->setUsername($fields[User::USERNAME]);
		}
		if( isset($fields[User::PASSWORD]) ){
			$user->setPassword($fields[User::PASSWORD]);
		}
		if( isset($fields[User::STATUS]) ){
			$user->setStatus($fields[User::STATUS]);
		}
	}
}
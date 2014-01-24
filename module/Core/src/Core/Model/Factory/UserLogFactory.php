<?php

/**
 *
 * UserLogBean
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

use Core\Model\Bean\UserLog;
use Core\Model\Exception\UserLogException;

class UserLogFactory extends LogFactory
{

		
 	/**
 	 *
 	 * Create UserLog from array
 	 *
 	 * @return UserLog
 	 */
	public static  function createFromArray($fields) 
	{
		$userLog = new UserLog();
		self::populate($userLog,$fields);
		return $userLog;
	}
		
 	/**
 	 *
 	 * Populate UserLog
 	 *
 	 */
	public static  function populate($userLog, $fields) 
	{
		parent::populate($userLog, $fields);
		if(!($userLog instanceof UserLog))
			throw new UserLogException('$userLog must be instance of UserLog');
		
		if($fields instanceof \stdClass)
		{
			$factory = self::getInstance();
			$stdClass = clone $fields;
			$fields = array();
			foreach ($stdClass as $key => $value)
				$fields[$factory->getUnderscore($key)] = $value;
		}
		
		if(isset($fields[UserLog::ID_USER_LOG])){
			$userLog->setIdUserLog($fields[UserLog::ID_USER_LOG]);
		}
		
		if(isset($fields[UserLog::ID_USER])){
			$userLog->setIdUser($fields[UserLog::ID_USER]);
		}
		
		if(isset($fields[UserLog::ID_LOG])){
			$userLog->setIdLog($fields[UserLog::ID_LOG]);
		}
		
	}
}
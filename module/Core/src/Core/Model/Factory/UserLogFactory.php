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
 * @created Mon Dec 9 11:15:21 2013
 * @version 1.0
 */

namespace Core\Model\Factory;

use Core\Model\Bean\UserLog;
use Core\Model\Factory\LogFactory;

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
			throw new ActionException('$userLog must be instance of UserLog');
		
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
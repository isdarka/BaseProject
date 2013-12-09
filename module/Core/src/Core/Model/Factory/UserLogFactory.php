<?php
/**
 *
 * @author isdarka
 * @created Nov 26, 2013 3:43:47 PM
 */

namespace Core\Model\Factory;

use Model\Factory\AbstractFactory;
use Core\Model\Bean\UserLog;
class UserLogFactory extends LogFactory
{
	public static function createFromArray($fields)
	{
		$userLog = new UserLog();
		self::populate($userLog, $fields);
		return $userLog;
	}
	
	public static function populate($userLog, $fields)
	{
		parent::populate($userLog, $fields);
		if( !($userLog instanceof UserLog) )
			throw new UserException('$userLog must be instance of UserLog');
	
		if( isset($fields[UserLog::ID_USER_LOG]) ){
			$userLog->setIdUserLog($fields[UserLog::ID_USER_LOG]);
		}
		
		if( isset($fields[UserLog::ID_USER]) ){
			$userLog->setIdUser($fields[UserLog::ID_USER]);
		}
		
		if( isset($fields[UserLog::ID_LOG]) ){
			$userLog->setIdLog($fields[UserLog::ID_LOG]);
		}
		
	}
}
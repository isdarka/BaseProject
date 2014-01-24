<?php

/**
 *
 * RoleLogBean
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

use Core\Model\Bean\RoleLog;
use Core\Model\Exception\RoleLogException;

class RoleLogFactory extends LogFactory
{

		
 	/**
 	 *
 	 * Create RoleLog from array
 	 *
 	 * @return RoleLog
 	 */
	public static  function createFromArray($fields) 
	{
		$roleLog = new RoleLog();
		self::populate($roleLog,$fields);
		return $roleLog;
	}
		
 	/**
 	 *
 	 * Populate RoleLog
 	 *
 	 */
	public static  function populate($roleLog, $fields) 
	{
		parent::populate($roleLog, $fields);
		if(!($roleLog instanceof RoleLog))
			throw new RoleLogException('$roleLog must be instance of RoleLog');
		
		if($fields instanceof \stdClass)
		{
			$factory = self::getInstance();
			$stdClass = clone $fields;
			$fields = array();
			foreach ($stdClass as $key => $value)
				$fields[$factory->getUnderscore($key)] = $value;
		}
		
		if(isset($fields[RoleLog::ID_ROLE_LOG])){
			$roleLog->setIdRoleLog($fields[RoleLog::ID_ROLE_LOG]);
		}
		
		if(isset($fields[RoleLog::ID_ROLE])){
			$roleLog->setIdRole($fields[RoleLog::ID_ROLE]);
		}
		
		if(isset($fields[RoleLog::ID_LOG])){
			$roleLog->setIdLog($fields[RoleLog::ID_LOG]);
		}
		
	}
}
<?php

/**
 *
 * LogBean
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

use Core\Model\Bean\Log;
use Model\Factory\AbstractFactory;

class LogFactory extends AbstractFactory
{

		
 	/**
 	 *
 	 * Create Log from array
 	 *
 	 * @return Log
 	 */
	public static  function createFromArray($fields) 
	{
		$log = new Log();
		self::populate($log,$fields);
		return $log;
	}
		
 	/**
 	 *
 	 * Populate Log
 	 *
 	 */
	public static  function populate($log, $fields) 
	{
		if(!($log instanceof Log))
			throw new ActionException('$log must be instance of Log');
		
		if(isset($fields[Log::ID_LOG])){
			$log->setIdLog($fields[Log::ID_LOG]);
		}
		
		if(isset($fields[Log::ID_USER])){
			$log->setIdUser($fields[Log::ID_USER]);
		}
		
		if(isset($fields[Log::TIMESTAMP])){
			$log->setTimestamp($fields[Log::TIMESTAMP]);
		}
		
		if(isset($fields[Log::EVENT])){
			$log->setEvent($fields[Log::EVENT]);
		}
		
		if(isset($fields[Log::NOTE])){
			$log->setNote($fields[Log::NOTE]);
		}
		
	}
}
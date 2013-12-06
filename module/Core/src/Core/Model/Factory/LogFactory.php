<?php
/**
 *
 * @author isdarka
 * @created Nov 26, 2013 3:43:47 PM
 */

namespace Core\Model\Factory;

use Model\Factory\AbstractFactory;
use Core\Model\Bean\Log;
class LogFactory extends AbstractFactory
{
	public static function createFromArray($fields)
	{
		$log = new Log();
		self::populate($log, $fields);
		return $log;
	}
	
	public static function populate($log, $fields)
	{
		if( !($log instanceof Log) )
			throw new UserException('$log must be instance of Log');
	
		if( isset($fields[Log::ID_LOG]) ){
			$log->setIdLog($fields[Log::ID_LOG]);
		}
		
		if( isset($fields[Log::ID_USER]) ){
			$log->setIdUser($fields[Log::ID_USER]);
		}
		
		if( isset($fields[Log::TIMESTAMP]) ){
			$log->setTimestamp($fields[Log::TIMESTAMP]);
		}
		
		if( isset($fields[Log::EVENT]) ){
			$log->setEvent($fields[Log::EVENT]);
		}
		
		if( isset($fields[Log::NOTE]) ){
			$log->setNote($fields[Log::NOTE]);
		}
	}
}
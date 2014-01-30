<?php

/**
 *
 * MessageLogBean
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Factory
 * @copyright 
 * @license 
 * @created Wed Jan 29 11:43:50 2014
 * @version 1.0
 */

namespace Core\Model\Factory;

use Core\Model\Bean\MessageLog;
use Core\Model\Exception\MessageLogException;

class MessageLogFactory extends LogFactory
{

		
 	/**
 	 *
 	 * Create MessageLog from array
 	 *
 	 * @return MessageLog
 	 */
	public static  function createFromArray($fields) 
	{
		$messageLog = new MessageLog();
		self::populate($messageLog,$fields);
		return $messageLog;
	}
		
 	/**
 	 *
 	 * Populate MessageLog
 	 *
 	 */
	public static  function populate($messageLog, $fields) 
	{
		parent::populate($messageLog, $fields);
		if(!($messageLog instanceof MessageLog))
			throw new MessageLogException('$messageLog must be instance of MessageLog');
		
		if($fields instanceof \stdClass)
		{
			$factory = self::getInstance();
			$stdClass = clone $fields;
			$fields = array();
			foreach ($stdClass as $key => $value)
				$fields[$factory->getUnderscore($key)] = $value;
		}
		
		if(isset($fields[MessageLog::ID_MESSAGE_LOG])){
			$messageLog->setIdMessageLog($fields[MessageLog::ID_MESSAGE_LOG]);
		}
		
		if(isset($fields[MessageLog::ID_MESSAGE])){
			$messageLog->setIdMessage($fields[MessageLog::ID_MESSAGE]);
		}
		
		if(isset($fields[MessageLog::ID_LOG])){
			$messageLog->setIdLog($fields[MessageLog::ID_LOG]);
		}
		
	}
}
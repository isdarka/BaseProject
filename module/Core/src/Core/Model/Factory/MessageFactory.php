<?php

/**
 *
 * MessageBean
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Factory
 * @copyright 
 * @license 
 * @created Wed Jan 29 11:40:44 2014
 * @version 1.0
 */

namespace Core\Model\Factory;

use Core\Model\Bean\Message;
use Model\Factory\AbstractFactory;
use Core\Model\Exception\MessageException;

class MessageFactory extends AbstractFactory
{

		
 	/**
 	 *
 	 * Create Message from array
 	 *
 	 * @return Message
 	 */
	public static  function createFromArray($fields) 
	{
		$message = new Message();
		self::populate($message,$fields);
		return $message;
	}
		
 	/**
 	 *
 	 * Populate Message
 	 *
 	 */
	public static  function populate($message, $fields) 
	{
		if(!($message instanceof Message))
			throw new MessageException('$message must be instance of Message');
		
		if($fields instanceof \stdClass)
		{
			$factory = self::getInstance();
			$stdClass = clone $fields;
			$fields = array();
			foreach ($stdClass as $key => $value)
				$fields[$factory->getUnderscore($key)] = $value;
		}
		
		if(isset($fields[Message::ID_MESSAGE])){
			$message->setIdMessage($fields[Message::ID_MESSAGE]);
		}
		
		if(isset($fields[Message::ID_USER])){
			$message->setIdUser($fields[Message::ID_USER]);
		}
		
		if(isset($fields[Message::STATUS])){
			$message->setStatus($fields[Message::STATUS]);
		}
		
		if(isset($fields[Message::TIMESTAMP])){
			$message->setTimestamp($fields[Message::TIMESTAMP]);
		}
		
		if(isset($fields[Message::SUBJECT])){
			$message->setSubject($fields[Message::SUBJECT]);
		}
		
		if(isset($fields[Message::MESSAGE]) && !empty($fields[Message::MESSAGE])){
			$message->setMessage($fields[Message::MESSAGE]);
		}
		
	}
}
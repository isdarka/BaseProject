<?php

/**
 *
 * UserMessageBean
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Factory
 * @copyright 
 * @license 
 * @created Wed Jan 29 14:40:50 2014
 * @version 1.0
 */

namespace Core\Model\Factory;

use Core\Model\Bean\UserMessage;
use Model\Factory\AbstractFactory;
use Core\Model\Exception\UserMessageException;

class UserMessageFactory extends AbstractFactory
{

		
 	/**
 	 *
 	 * Create UserMessage from array
 	 *
 	 * @return UserMessage
 	 */
	public static  function createFromArray($fields) 
	{
		$userMessage = new UserMessage();
		self::populate($userMessage,$fields);
		return $userMessage;
	}
		
 	/**
 	 *
 	 * Populate UserMessage
 	 *
 	 */
	public static  function populate($userMessage, $fields) 
	{
		if(!($userMessage instanceof UserMessage))
			throw new UserMessageException('$userMessage must be instance of UserMessage');
		
		if($fields instanceof \stdClass)
		{
			$factory = self::getInstance();
			$stdClass = clone $fields;
			$fields = array();
			foreach ($stdClass as $key => $value)
				$fields[$factory->getUnderscore($key)] = $value;
		}
		
		if(isset($fields[UserMessage::ID_USER_MESSAGE])){
			$userMessage->setIdUserMessage($fields[UserMessage::ID_USER_MESSAGE]);
		}
		
		if(isset($fields[UserMessage::STATUS])){
			$userMessage->setStatus($fields[UserMessage::STATUS]);
		}
		
		if(isset($fields[UserMessage::ID_USER])){
			$userMessage->setIdUser($fields[UserMessage::ID_USER]);
		}
		
		if(isset($fields[UserMessage::ID_MESSAGE])){
			$userMessage->setIdMessage($fields[UserMessage::ID_MESSAGE]);
		}
		
	}
}
<?php

/**
 *
 * EmailBean
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

use Core\Model\Bean\Email;
use Model\Factory\AbstractFactory;
use Core\Model\Exception\EmailException;

class EmailFactory extends AbstractFactory
{

		
 	/**
 	 *
 	 * Create Email from array
 	 *
 	 * @return Email
 	 */
	public static  function createFromArray($fields) 
	{
		$email = new Email();
		self::populate($email,$fields);
		return $email;
	}
		
 	/**
 	 *
 	 * Populate Email
 	 *
 	 */
	public static  function populate($email, $fields) 
	{
		if(!($email instanceof Email))
			throw new EmailException('$email must be instance of Email');
		
		if($fields instanceof \stdClass)
		{
			$factory = self::getInstance();
			$stdClass = clone $fields;
			$fields = array();
			foreach ($stdClass as $key => $value)
				$fields[$factory->getUnderscore($key)] = $value;
		}
		
		if(isset($fields[Email::ID_EMAIL])){
			$email->setIdEmail($fields[Email::ID_EMAIL]);
		}
		
		if(isset($fields[Email::EMAIL])){
			$email->setEmail($fields[Email::EMAIL]);
		}
		
	}
}
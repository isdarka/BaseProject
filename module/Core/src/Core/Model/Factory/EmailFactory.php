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
 * @created Wed Dec 11 09:36:19 2013
 * @version 1.0
 */

namespace Core\Model\Factory;

use Core\Model\Bean\Email;
use Model\Factory\AbstractFactory;

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
			throw new ActionException('$email must be instance of Email');
		
		if(isset($fields[Email::ID_EMAIL])){
			$email->setIdEmail($fields[Email::ID_EMAIL]);
		}
		
		if(isset($fields[Email::EMAIL])){
			$email->setEmail($fields[Email::EMAIL]);
		}
		
	}
}
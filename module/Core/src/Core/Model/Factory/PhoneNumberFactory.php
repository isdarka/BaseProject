<?php

/**
 *
 * PhoneNumberBean
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Factory
 * @copyright 
 * @license 
 * @created Wed Dec 11 09:30:39 2013
 * @version 1.0
 */

namespace Core\Model\Factory;

use Core\Model\Bean\PhoneNumber;
use Model\Factory\AbstractFactory;

class PhoneNumberFactory extends AbstractFactory
{

		
 	/**
 	 *
 	 * Create PhoneNumber from array
 	 *
 	 * @return PhoneNumber
 	 */
	public static  function createFromArray($fields) 
	{
		$phoneNumber = new PhoneNumber();
		self::populate($phoneNumber,$fields);
		return $phoneNumber;
	}
		
 	/**
 	 *
 	 * Populate PhoneNumber
 	 *
 	 */
	public static  function populate($phoneNumber, $fields) 
	{
		if(!($phoneNumber instanceof PhoneNumber))
			throw new ActionException('$phoneNumber must be instance of PhoneNumber');
		
		if(isset($fields[PhoneNumber::ID_PHONE_NUMBER])){
			$phoneNumber->setIdPhoneNumber($fields[PhoneNumber::ID_PHONE_NUMBER]);
		}
		
		if(isset($fields[PhoneNumber::AREA])){
			$phoneNumber->setArea($fields[PhoneNumber::AREA]);
		}
		
		if(isset($fields[PhoneNumber::TYPE])){
			$phoneNumber->setType($fields[PhoneNumber::TYPE]);
		}
		
		if(isset($fields[PhoneNumber::EXTENSION])){
			$phoneNumber->setExtension($fields[PhoneNumber::EXTENSION]);
		}
		
		if(isset($fields[PhoneNumber::NUMBER])){
			$phoneNumber->setNumber($fields[PhoneNumber::NUMBER]);
		}
		
	}
}
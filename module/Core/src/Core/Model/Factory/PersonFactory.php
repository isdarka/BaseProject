<?php

/**
 *
 * PersonBean
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

use Core\Model\Bean\Person;
use Model\Factory\AbstractFactory;

class PersonFactory extends AbstractFactory
{

		
 	/**
 	 *
 	 * Create Person from array
 	 *
 	 * @return Person
 	 */
	public static  function createFromArray($fields) 
	{
		$person = new Person();
		self::populate($person,$fields);
		return $person;
	}
		
 	/**
 	 *
 	 * Populate Person
 	 *
 	 */
	public static  function populate($person, $fields) 
	{
		if(!($person instanceof Person))
			throw new ActionException('$person must be instance of Person');
		
		if(isset($fields[Person::ID_PERSON])){
			$person->setIdPerson($fields[Person::ID_PERSON]);
		}
		
		if(isset($fields[Person::ID_ADDRESS])){
			$person->setIdAddress($fields[Person::ID_ADDRESS]);
		}
		
		if(isset($fields[Person::NAME])){
			$person->setName($fields[Person::NAME]);
		}
		
		if(isset($fields[Person::LAST_NAME])){
			$person->setLastName($fields[Person::LAST_NAME]);
		}
		
		if(isset($fields[Person::SECOND_LAST_NAME])){
			$person->setSecondLastName($fields[Person::SECOND_LAST_NAME]);
		}
		
		if(isset($fields[Person::BIRTHDATE])){
			$person->setBirthdate($fields[Person::BIRTHDATE]);
		}
		
	}
}
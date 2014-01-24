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
 * @created Fri Dec 20 17:00:49 2013
 * @version 1.0
 */

namespace Core\Model\Factory;

use Core\Model\Bean\Person;
use Model\Factory\AbstractFactory;
use Core\Model\Exception\PersonException;

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
			throw new PersonException('$person must be instance of Person');
		
		if($fields instanceof \stdClass)
		{
			$factory = self::getInstance();
			$stdClass = clone $fields;
			$fields = array();
			foreach ($stdClass as $key => $value)
				$fields[$factory->getUnderscore($key)] = $value;
		}
		
		if(isset($fields[Person::ID_PERSON])){
			$person->setIdPerson($fields[Person::ID_PERSON]);
		}
		
		if(isset($fields[Person::ID_ADDRESS]) && !empty($fields[Person::ID_ADDRESS])){
			$person->setIdAddress($fields[Person::ID_ADDRESS]);
		}
		
		if(isset($fields[Person::NAME]) && !empty($fields[Person::NAME])){
			$person->setName($fields[Person::NAME]);
		}
		
		if(isset($fields[Person::LAST_NAME]) && !empty($fields[Person::LAST_NAME])){
			$person->setLastName($fields[Person::LAST_NAME]);
		}
		
		if(isset($fields[Person::SECOND_LAST_NAME]) && !empty($fields[Person::SECOND_LAST_NAME])){
			$person->setSecondLastName($fields[Person::SECOND_LAST_NAME]);
		}
		
		if(isset($fields[Person::BIRTHDATE]) && !empty($fields[Person::BIRTHDATE])){
			$person->setBirthdate($fields[Person::BIRTHDATE]);
		}
		
		if(isset($fields[Person::CURP]) && !empty($fields[Person::CURP])){
			$person->setCurp($fields[Person::CURP]);
		}
		
		if(isset($fields[Person::TAX_REFERENCE]) && !empty($fields[Person::TAX_REFERENCE])){
			$person->setTaxReference($fields[Person::TAX_REFERENCE]);
		}
		
		if(isset($fields[Person::REGISTRY_CORE]) && !empty($fields[Person::REGISTRY_CORE])){
			$person->setRegistryCore($fields[Person::REGISTRY_CORE]);
		}
		
		if(isset($fields[Person::GENDER])){
			$person->setGender($fields[Person::GENDER]);
		}
		
		if(isset($fields[Person::MARITAL_STATUS])){
			$person->setMaritalStatus($fields[Person::MARITAL_STATUS]);
		}
		
	}
}
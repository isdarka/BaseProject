<?php
/**
 *
 * @author isdarka
 * @created Nov 26, 2013 3:43:47 PM
 */

namespace Core\Model\Factory;

use Model\Factory\AbstractFactory;
use Core\Model\Bean\Person;
class PersonFactory extends AbstractFactory
{
	public static function createFromArray($fields)
	{
		$person = new Person();
		self::populate($person, $fields);
		return $person;
	}
	
	public static function populate($person, $fields)
	{
		if( !($person instanceof Person) )
			throw new UserException('$$person must be instance of Person');
	
		if( isset($fields[Person::ID_PERSON]) ){
			$person->setIdPerson($fields[Person::ID_PERSON]);
		}
		
		if( isset($fields[Person::NAME]) ){
			$person->setName($fields[Person::NAME]);
		}
		
		if( isset($fields[Person::LAST_NAME]) ){
			$person->setLastName($fields[Person::LAST_NAME]);
		}
		
		if( isset($fields[Person::SECOND_LAST_NAME]) ){
			$person->setSecondLastName($fields[Person::SECOND_LAST_NAME]);
		}
		
		if( isset($fields[Person::BIRTHDATE]) ){
			$person->setBirthdate($fields[Person::BIRTHDATE]);
		}
		
	}
}
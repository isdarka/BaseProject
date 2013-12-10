<?php

/**
 *
 * PersonBean
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Bean
 * @copyright 
 * @license 
 * @created Mon Dec 9 11:25:03 2013
 * @version 1.0
 */

namespace Core\Model\Bean;

use Model\Bean\AbstractBean;

class Person extends AbstractBean
{

	const TABLENAME = 'common_persons';

	const ID_PERSON = 'id_person';

	const NAME = 'name';

	const LAST_NAME = 'last_name';

	const SECOND_LAST_NAME = 'second_last_name';

	const BIRTHDATE = 'birthdate';

	private $idPerson;

	private $name;

	private $lastName;

	private $secondLastName;

	private $birthdate;

		
 	/**
 	 *
 	 * Get the idPerson property
 	 *
 	 * @return int $idPerson
 	 */
	public function getIndex() 
	{
		return $this->idPerson;
	}
		
 	/**
 	 *
 	 * Set the idPerson property
 	 *
 	 * @param int $idPerson
 	 */
	public function setIdPerson($idPerson) 
	{
		$this->idPerson = $idPerson;
		return $this;
	}
		
 	/**
 	 *
 	 * Set the name property
 	 *
 	 * @param string $name
 	 */
	public function setName($name) 
	{
		$this->name = $name;
		return $this;
	}
		
 	/**
 	 *
 	 * Set the lastName property
 	 *
 	 * @param string $lastName
 	 */
	public function setLastName($lastName) 
	{
		$this->lastName = $lastName;
		return $this;
	}
		
 	/**
 	 *
 	 * Set the secondLastName property
 	 *
 	 * @param string $secondLastName
 	 */
	public function setSecondLastName($secondLastName) 
	{
		$this->secondLastName = $secondLastName;
		return $this;
	}
		
 	/**
 	 *
 	 * Set the birthdate property
 	 *
 	 * @param $birthdate
 	 */
	public function setBirthdate($birthdate) 
	{
		$this->birthdate = $birthdate;
		return $this;
	}
		
 	/**
 	 *
 	 * Get the idPerson property
 	 *
 	 * @return int $idPerson
 	 */
	public function getIdPerson() 
	{
		return $this->idPerson;
	}
		
 	/**
 	 *
 	 * Get the name property
 	 *
 	 * @return string $name
 	 */
	public function getName() 
	{
		return $this->name;
	}
		
 	/**
 	 *
 	 * Get the lastName property
 	 *
 	 * @return string $lastName
 	 */
	public function getLastName() 
	{
		return $this->lastName;
	}
		
 	/**
 	 *
 	 * Get the secondLastName property
 	 *
 	 * @return string $secondLastName
 	 */
	public function getSecondLastName() 
	{
		return $this->secondLastName;
	}
		
	public function getFullName()
	{
		return $this->getName() . " " . $this->getLastName() . " " . $this->getSecondLastName();
	}
 	/**
 	 *
 	 * Get the birthdate property
 	 *
 	 * @return Zend_Date $birthdate
 	 */
	public function getBirthdate() 
	{
		return $this->birthdate;
	}
		
 	/**
 	 *
 	 * Get the Array
 	 *
 	 * @return array
 	 */
	public function toArray() 
	{
		$array = array(
			self::ID_PERSON => $this->getIdPerson(),
			self::NAME => $this->getName(),
			self::LAST_NAME => $this->getLastName(),
			self::SECOND_LAST_NAME => $this->getSecondLastName(),
			self::BIRTHDATE => $this->getBirthdate(),
		);
		return $array;
	}
}
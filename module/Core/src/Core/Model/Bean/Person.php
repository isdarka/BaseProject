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

	const ID_ADDRESS = 'id_address';

	const NAME = 'name';

	const LAST_NAME = 'last_name';

	const SECOND_LAST_NAME = 'second_last_name';

	const BIRTHDATE = 'birthdate';

	const CURP = 'curp';

	const TAX_REFERENCE = 'tax_reference';

	const REGISTRY_CORE = 'registry_core';

	const GENDER = 'gender';

	const MARITAL_STATUS = 'marital_status';

	private $idPerson;

	private $idAddress;

	private $name;

	private $lastName;

	private $secondLastName;

	private $birthdate;

	private $curp;

	private $taxReference;

	private $registryCore;

	private $gender = '1';

	private $maritalStatus = '1';

		
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
 	 * Set the idAddress property
 	 *
 	 * @param int $idAddress
 	 */
	public function setIdAddress($idAddress) 
	{
		$this->idAddress = $idAddress;
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
 	 * Set the curp property
 	 *
 	 * @param string $curp
 	 */
	public function setCurp($curp) 
	{
		$this->curp = $curp;
		return $this;
	}
		
 	/**
 	 *
 	 * Set the taxReference property
 	 *
 	 * @param string $taxReference
 	 */
	public function setTaxReference($taxReference) 
	{
		$this->taxReference = $taxReference;
		return $this;
	}
		
 	/**
 	 *
 	 * Set the registryCore property
 	 *
 	 * @param string $registryCore
 	 */
	public function setRegistryCore($registryCore) 
	{
		$this->registryCore = $registryCore;
		return $this;
	}
		
 	/**
 	 *
 	 * Set the gender property
 	 *
 	 * @param int $gender
 	 */
	public function setGender($gender) 
	{
		$this->gender = $gender;
		return $this;
	}
		
 	/**
 	 *
 	 * Set the maritalStatus property
 	 *
 	 * @param int $maritalStatus
 	 */
	public function setMaritalStatus($maritalStatus) 
	{
		$this->maritalStatus = $maritalStatus;
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
 	 * Get the idAddress property
 	 *
 	 * @return int $idAddress
 	 */
	public function getIdAddress() 
	{
		return $this->idAddress;
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
 	 * Get the curp property
 	 *
 	 * @return string $curp
 	 */
	public function getCurp() 
	{
		return $this->curp;
	}
		
 	/**
 	 *
 	 * Get the taxReference property
 	 *
 	 * @return string $taxReference
 	 */
	public function getTaxReference() 
	{
		return $this->taxReference;
	}
		
 	/**
 	 *
 	 * Get the registryCore property
 	 *
 	 * @return string $registryCore
 	 */
	public function getRegistryCore() 
	{
		return $this->registryCore;
	}
		
 	/**
 	 *
 	 * Get the gender property
 	 *
 	 * @return int $gender
 	 */
	public function getGender() 
	{
		return $this->gender;
	}
		
 	/**
 	 *
 	 * Get the maritalStatus property
 	 *
 	 * @return int $maritalStatus
 	 */
	public function getMaritalStatus() 
	{
		return $this->maritalStatus;
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
			self::ID_ADDRESS => $this->getIdAddress(),
			self::NAME => $this->getName(),
			self::LAST_NAME => $this->getLastName(),
			self::SECOND_LAST_NAME => $this->getSecondLastName(),
			self::BIRTHDATE => $this->getBirthdate(),
			self::CURP => $this->getCurp(),
			self::TAX_REFERENCE => $this->getTaxReference(),
			self::REGISTRY_CORE => $this->getRegistryCore(),
			self::GENDER => $this->getGender(),
			self::MARITAL_STATUS => $this->getMaritalStatus(),
		);
		return $array;
	}
	const MALE = 1;
	const FEMALE = 2;
	public static $genders = array(
			self::MALE => "Masculino",
			self::FEMALE => "Femenino",
	);

	const SINGLE = 1;
	const DIVORCED = 2;
	const MARRIED = 3;
	const WIDOWER = 4;
	
	public static $maritalStatuses = array(
			self::SINGLE => "Soltero",
			self::DIVORCED => "Divorciado",
			self::MARRIED => "Casado",
			self::WIDOWER => "Viudo",
	);
}
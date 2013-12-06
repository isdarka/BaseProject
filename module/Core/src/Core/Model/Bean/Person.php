<?php
/**
 *
 * @author isdarka
 * @created Nov 26, 2013 3:09:58 PM
 */

namespace Core\Model\Bean;

use Model\Bean\AbstractBean;

class Person extends AbstractBean
{
	const TABLENAME = "common_persons";
		
	const ID_PERSON = "id_person";
	const NAME = "name";
	const LAST_NAME = "last_name";
	const SECOND_LAST_NAME = "second_last_name";
	const BIRTHDATE = "birthdate";
	
	
	private $idPerson;
	private $name;
	private $lastName;
	private $secondLastName;
	private $birthdate;
	
	public function getIndex()
	{
		return $this->idPerson;	
	}
	
	public function setIdPerson($idPerson){
		$this->idPerson = $idPerson;
		return $this;
	}
	
	public function getIdPerson(){
		return $this->idPerson;
	}
	
	public function setName($name){
		$this->name = $name;
		return $this;
	}
	
	public function getName(){
		return $this->name;
	}
	
	public function setLastName($lastName){
		$this->lastName = $lastName;
		return $this;
	}
	
	public function getLastName(){
		return $this->lastName;
	}
	
	public function setSecondLastName($secondLastName){
		$this->secondLastName = $secondLastName;
		return $this;
	}
	
	public function getSecondLastName(){
		return $this->secondLastName;
	}
	
	public function getFullName()
	{
		return $this->getName() . " " . $this->getLastName() . " " . $this->getSecondLastName();	
	}
	
	public function setBirthdate($birthdate){
		$this->birthdate = $birthdate;
		return $this;
	}
	
	public function getBirthdate(){
		return $this->birthdate;
	}
	
	public function toArray()
	{
		return array(
				self::ID_PERSON => $this->getIdPerson(),
				self::NAME => $this->getName(),
				self::LAST_NAME => $this->getLastName(),
				self::SECOND_LAST_NAME => $this->getSecondLastName(),
				self::BIRTHDATE => $this->getBirthdate(),
		);
	}
}
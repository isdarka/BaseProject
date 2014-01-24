<?php

/**
 *
 * PhoneNumberBean
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Bean
 * @copyright 
 * @license 
 * @created Tue Dec 10 18:26:49 2013
 * @version 1.0
 */

namespace Core\Model\Bean;

use Model\Bean\AbstractBean;

class PhoneNumber extends AbstractBean
{

	const TABLENAME = 'common_phone_numbers';

	const ID_PHONE_NUMBER = 'id_phone_number';

	const AREA = 'area';

	const TYPE = 'type';

	const EXTENSION = 'extension';

	const NUMBER = 'number';

	private $idPhoneNumber;

	private $area;

	private $type;

	private $extension;

	private $number;

		
 	/**
 	 *
 	 * Get the idPhoneNumber property
 	 *
 	 * @return int $idPhoneNumber
 	 */
	public function getIndex() 
	{
		return $this->idPhoneNumber;
	}
		
 	/**
 	 *
 	 * Set the idPhoneNumber property
 	 *
 	 * @param int $idPhoneNumber
 	 */
	public function setIdPhoneNumber($idPhoneNumber) 
	{
		$this->idPhoneNumber = $idPhoneNumber;
		return $this;
	}
		
 	/**
 	 *
 	 * Set the area property
 	 *
 	 * @param string $area
 	 */
	public function setArea($area) 
	{
		$this->area = $area;
		return $this;
	}
		
 	/**
 	 *
 	 * Set the type property
 	 *
 	 * @param int $type
 	 */
	public function setType($type) 
	{
		$this->type = $type;
		return $this;
	}
		
 	/**
 	 *
 	 * Set the extension property
 	 *
 	 * @param string $extension
 	 */
	public function setExtension($extension) 
	{
		$this->extension = $extension;
		return $this;
	}
		
 	/**
 	 *
 	 * Set the number property
 	 *
 	 * @param string $number
 	 */
	public function setNumber($number) 
	{
		$this->number = $number;
		return $this;
	}
		
 	/**
 	 *
 	 * Get the idPhoneNumber property
 	 *
 	 * @return int $idPhoneNumber
 	 */
	public function getIdPhoneNumber() 
	{
		return $this->idPhoneNumber;
	}
		
 	/**
 	 *
 	 * Get the area property
 	 *
 	 * @return string $area
 	 */
	public function getArea() 
	{
		return $this->area;
	}
		
 	/**
 	 *
 	 * Get the type property
 	 *
 	 * @return int $type
 	 */
	public function getType() 
	{
		return $this->type;
	}
		
 	/**
 	 *
 	 * Get the extension property
 	 *
 	 * @return string $extension
 	 */
	public function getExtension() 
	{
		return $this->extension;
	}
		
 	/**
 	 *
 	 * Get the number property
 	 *
 	 * @return string $number
 	 */
	public function getNumber() 
	{
		return $this->number;
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
			self::ID_PHONE_NUMBER => $this->getIdPhoneNumber(),
			self::AREA => $this->getArea(),
			self::TYPE => $this->getType(),
			self::EXTENSION => $this->getExtension(),
			self::NUMBER => $this->getNumber(),
		);
		return $array;
	}
	
	const HOME = 1;
	const WORK = 2;
	const MOBIL = 3;
	const OTHER = 4;
	
	public static $types = array(
			self::HOME => "Home",
			self::WORK => "Work",
			self::MOBIL => "Mobil",
			self::OTHER => "Other",
	);
}
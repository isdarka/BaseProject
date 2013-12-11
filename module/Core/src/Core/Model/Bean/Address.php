<?php

/**
 *
 * AddressBean
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Bean
 * @copyright 
 * @license 
 * @created Wed Dec 11 09:48:20 2013
 * @version 1.0
 */

namespace Core\Model\Bean;

use Model\Bean\AbstractBean;

class Address extends AbstractBean
{

	const TABLENAME = 'common_address';

	const ID_ADDRESS = 'id_address';

	const STREET = 'street';

	const HOUSE_NUMBER = 'house_number';

	const APARTMENT_NUMBER = 'apartment_number';

	const ZIPCODE = 'zipcode';

	const NEIGHBORHOOD = 'neighborhood';

	const SETTLEMENT = 'settlement';

	const CITY = 'city';

	const STATE = 'state';

	private $idAddress;

	private $street;

	private $houseNumber;

	private $apartmentNumber;

	private $zipcode;

	private $neighborhood;

	private $settlement;

	private $city;

	private $state;

		
 	/**
 	 *
 	 * Get the idAddress property
 	 *
 	 * @return int $idAddress
 	 */
	public function getIndex() 
	{
		return $this->idAddress;
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
 	 * Set the street property
 	 *
 	 * @param string $street
 	 */
	public function setStreet($street) 
	{
		$this->street = $street;
		return $this;
	}
		
 	/**
 	 *
 	 * Set the houseNumber property
 	 *
 	 * @param string $houseNumber
 	 */
	public function setHouseNumber($houseNumber) 
	{
		$this->houseNumber = $houseNumber;
		return $this;
	}
		
 	/**
 	 *
 	 * Set the apartmentNumber property
 	 *
 	 * @param string $apartmentNumber
 	 */
	public function setApartmentNumber($apartmentNumber) 
	{
		$this->apartmentNumber = $apartmentNumber;
		return $this;
	}
		
 	/**
 	 *
 	 * Set the zipcode property
 	 *
 	 * @param string $zipcode
 	 */
	public function setZipcode($zipcode) 
	{
		$this->zipcode = $zipcode;
		return $this;
	}
		
 	/**
 	 *
 	 * Set the neighborhood property
 	 *
 	 * @param string $neighborhood
 	 */
	public function setNeighborhood($neighborhood) 
	{
		$this->neighborhood = $neighborhood;
		return $this;
	}
		
 	/**
 	 *
 	 * Set the settlement property
 	 *
 	 * @param string $settlement
 	 */
	public function setSettlement($settlement) 
	{
		$this->settlement = $settlement;
		return $this;
	}
		
 	/**
 	 *
 	 * Set the city property
 	 *
 	 * @param string $city
 	 */
	public function setCity($city) 
	{
		$this->city = $city;
		return $this;
	}
		
 	/**
 	 *
 	 * Set the state property
 	 *
 	 * @param string $state
 	 */
	public function setState($state) 
	{
		$this->state = $state;
		return $this;
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
 	 * Get the street property
 	 *
 	 * @return string $street
 	 */
	public function getStreet() 
	{
		return $this->street;
	}
		
 	/**
 	 *
 	 * Get the houseNumber property
 	 *
 	 * @return string $houseNumber
 	 */
	public function getHouseNumber() 
	{
		return $this->houseNumber;
	}
		
 	/**
 	 *
 	 * Get the apartmentNumber property
 	 *
 	 * @return string $apartmentNumber
 	 */
	public function getApartmentNumber() 
	{
		return $this->apartmentNumber;
	}
		
 	/**
 	 *
 	 * Get the zipcode property
 	 *
 	 * @return string $zipcode
 	 */
	public function getZipcode() 
	{
		return $this->zipcode;
	}
		
 	/**
 	 *
 	 * Get the neighborhood property
 	 *
 	 * @return string $neighborhood
 	 */
	public function getNeighborhood() 
	{
		return $this->neighborhood;
	}
		
 	/**
 	 *
 	 * Get the settlement property
 	 *
 	 * @return string $settlement
 	 */
	public function getSettlement() 
	{
		return $this->settlement;
	}
		
 	/**
 	 *
 	 * Get the city property
 	 *
 	 * @return string $city
 	 */
	public function getCity() 
	{
		return $this->city;
	}
		
 	/**
 	 *
 	 * Get the state property
 	 *
 	 * @return string $state
 	 */
	public function getState() 
	{
		return $this->state;
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
			self::ID_ADDRESS => $this->getIdAddress(),
			self::STREET => $this->getStreet(),
			self::HOUSE_NUMBER => $this->getHouseNumber(),
			self::APARTMENT_NUMBER => $this->getApartmentNumber(),
			self::ZIPCODE => $this->getZipcode(),
			self::NEIGHBORHOOD => $this->getNeighborhood(),
			self::SETTLEMENT => $this->getSettlement(),
			self::CITY => $this->getCity(),
			self::STATE => $this->getState(),
		);
		return $array;
	}
}
<?php

/**
 *
 * AddressBean
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Factory
 * @copyright 
 * @license 
 * @created Wed Dec 11 09:48:20 2013
 * @version 1.0
 */

namespace Core\Model\Factory;

use Core\Model\Bean\Address;
use Model\Factory\AbstractFactory;

class AddressFactory extends AbstractFactory
{

		
 	/**
 	 *
 	 * Create Address from array
 	 *
 	 * @return Address
 	 */
	public static  function createFromArray($fields) 
	{
		$address = new Address();
		self::populate($address,$fields);
		return $address;
	}
		
 	/**
 	 *
 	 * Populate Address
 	 *
 	 */
	public static  function populate($address, $fields) 
	{
		if(!($address instanceof Address))
			throw new ActionException('$address must be instance of Address');
		
		if(isset($fields[Address::ID_ADDRESS])){
			$address->setIdAddress($fields[Address::ID_ADDRESS]);
		}
		
		if(isset($fields[Address::STREET])){
			$address->setStreet($fields[Address::STREET]);
		}
		
		if(isset($fields[Address::HOUSE_NUMBER])){
			$address->setHouseNumber($fields[Address::HOUSE_NUMBER]);
		}
		
		if(isset($fields[Address::APARTMENT_NUMBER])){
			$address->setApartmentNumber($fields[Address::APARTMENT_NUMBER]);
		}
		
		if(isset($fields[Address::ZIPCODE])){
			$address->setZipcode($fields[Address::ZIPCODE]);
		}
		
		if(isset($fields[Address::NEIGHBORHOOD])){
			$address->setNeighborhood($fields[Address::NEIGHBORHOOD]);
		}
		
		if(isset($fields[Address::SETTLEMENT])){
			$address->setSettlement($fields[Address::SETTLEMENT]);
		}
		
		if(isset($fields[Address::CITY])){
			$address->setCity($fields[Address::CITY]);
		}
		
		if(isset($fields[Address::STATE])){
			$address->setState($fields[Address::STATE]);
		}
		
	}
}
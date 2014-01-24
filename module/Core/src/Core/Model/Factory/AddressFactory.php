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
 * @created Fri Dec 20 17:00:49 2013
 * @version 1.0
 */

namespace Core\Model\Factory;

use Core\Model\Bean\Address;
use Model\Factory\AbstractFactory;
use Core\Model\Exception\AddressException;

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
			throw new AddressException('$address must be instance of Address');
		
		if($fields instanceof \stdClass)
		{
			$factory = self::getInstance();
			$stdClass = clone $fields;
			$fields = array();
			foreach ($stdClass as $key => $value)
				$fields[$factory->getUnderscore($key)] = $value;
		}
		
		if(isset($fields[Address::ID_ADDRESS])){
			$address->setIdAddress($fields[Address::ID_ADDRESS]);
		}
		
		if(isset($fields[Address::STREET]) && !empty($fields[Address::STREET])){
			$address->setStreet($fields[Address::STREET]);
		}
		
		if(isset($fields[Address::HOUSE_NUMBER]) && !empty($fields[Address::HOUSE_NUMBER])){
			$address->setHouseNumber($fields[Address::HOUSE_NUMBER]);
		}
		
		if(isset($fields[Address::APARTMENT_NUMBER]) && !empty($fields[Address::APARTMENT_NUMBER])){
			$address->setApartmentNumber($fields[Address::APARTMENT_NUMBER]);
		}
		
		if(isset($fields[Address::ZIPCODE]) && !empty($fields[Address::ZIPCODE])){
			$address->setZipcode($fields[Address::ZIPCODE]);
		}
		
		if(isset($fields[Address::NEIGHBORHOOD]) && !empty($fields[Address::NEIGHBORHOOD])){
			$address->setNeighborhood($fields[Address::NEIGHBORHOOD]);
		}
		
		if(isset($fields[Address::SETTLEMENT]) && !empty($fields[Address::SETTLEMENT])){
			$address->setSettlement($fields[Address::SETTLEMENT]);
		}
		
		if(isset($fields[Address::CITY]) && !empty($fields[Address::CITY])){
			$address->setCity($fields[Address::CITY]);
		}
		
		if(isset($fields[Address::STATE]) && !empty($fields[Address::STATE])){
			$address->setState($fields[Address::STATE]);
		}
		
	}
}
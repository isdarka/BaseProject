<?php

/**
 *
 * AddressBean
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Metadata
 * @copyright 
 * @license 
 * @created Wed Dec 11 09:48:20 2013
 * @version 1.0
 */

namespace Core\Model\Metadata;

use Model\Bean\AbstractBean;
use Model\Metadata\AbstractMetadata;
use Core\Model\Bean\Address;
use Core\Model\Factory\AddressFactory;
use Core\Model\Collection\AddressCollection;

class AddressMetadata extends AbstractMetadata
{

		
 	/**
 	 *
 	 * toUpdateArray
 	 *
 	 */
	public function toUpdateArray(AbstractBean $bean) 
	{
		return $bean->toArrayFor(
			array(
				Address::STREET,
				Address::HOUSE_NUMBER,
				Address::APARTMENT_NUMBER,
				Address::ZIPCODE,
				Address::NEIGHBORHOOD,
				Address::SETTLEMENT,
				Address::CITY,
				Address::STATE,
			)
		);
	}
		
 	/**
 	 *
 	 * toCreateArray
 	 *
 	 */
	public function toCreateArray(AbstractBean $bean) 
	{
		return $bean->toArrayFor(
			array(
				Address::ID_ADDRESS,
				Address::STREET,
				Address::HOUSE_NUMBER,
				Address::APARTMENT_NUMBER,
				Address::ZIPCODE,
				Address::NEIGHBORHOOD,
				Address::SETTLEMENT,
				Address::CITY,
				Address::STATE,
			)
		);
	}
		
 	/**
 	 *
 	 * Get fields
 	 *
 	 */
	public function getFields() 
	{
		return array(
			Address::ID_ADDRESS,
			Address::STREET,
			Address::HOUSE_NUMBER,
			Address::APARTMENT_NUMBER,
			Address::ZIPCODE,
			Address::NEIGHBORHOOD,
			Address::SETTLEMENT,
			Address::CITY,
			Address::STATE,
		);
	}
		
 	/**
 	 *
 	 * Get Entity Name
 	 *
 	 * @return string
 	 */
	public function getEntityName() 
	{
		return "Address";
	}
		
 	/**
 	 *
 	 * Get TableName
 	 *
 	 * @return string
 	 */
	public function getTableName() 
	{
		return "common_address";
	}
		
 	/**
 	 *
 	 * Get PrimaryKey
 	 *
 	 * @return string
 	 */
	public function getPrimaryKey() 
	{
		return "id_address";
	}
		
 	/**
 	 *
 	 * Get Factory
 	 *
 	 * @return AddressFactory
 	 */
	public function getFactory() 
	{
		static $factory = null;
		if( null == $factory ){
			$factory = new AddressFactory();
		}
		return $factory;
	}
		
 	/**
 	 *
 	 * Get Collection
 	 *
 	 * @return AddressCollection
 	 */
	public function newCollection() 
	{
		return new AddressCollection();
	}
		
 	/**
 	 *
 	 * Get Bean
 	 *
 	 * @return Address
 	 */
	public function newBean() 
	{
		return new Address();
	}
}
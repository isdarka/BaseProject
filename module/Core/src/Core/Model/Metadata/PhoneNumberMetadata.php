<?php

/**
 *
 * PhoneNumberBean
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Metadata
 * @copyright 
 * @license 
 * @created Wed Dec 11 09:30:39 2013
 * @version 1.0
 */

namespace Core\Model\Metadata;

use Model\Bean\AbstractBean;
use Model\Metadata\AbstractMetadata;
use Core\Model\Bean\PhoneNumber;
use Core\Model\Factory\PhoneNumberFactory;
use Core\Model\Collection\PhoneNumberCollection;

class PhoneNumberMetadata extends AbstractMetadata
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
				PhoneNumber::AREA,
				PhoneNumber::TYPE,
				PhoneNumber::EXTENSION,
				PhoneNumber::NUMBER,
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
				PhoneNumber::ID_PHONE_NUMBER,
				PhoneNumber::AREA,
				PhoneNumber::TYPE,
				PhoneNumber::EXTENSION,
				PhoneNumber::NUMBER,
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
			PhoneNumber::ID_PHONE_NUMBER,
			PhoneNumber::AREA,
			PhoneNumber::TYPE,
			PhoneNumber::EXTENSION,
			PhoneNumber::NUMBER,
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
		return "PhoneNumber";
	}
		
 	/**
 	 *
 	 * Get TableName
 	 *
 	 * @return string
 	 */
	public function getTableName() 
	{
		return "common_phone_numbers";
	}
		
 	/**
 	 *
 	 * Get PrimaryKey
 	 *
 	 * @return string
 	 */
	public function getPrimaryKey() 
	{
		return "id_phone_number";
	}
		
 	/**
 	 *
 	 * Get Factory
 	 *
 	 * @return PhoneNumberFactory
 	 */
	public function getFactory() 
	{
		static $factory = null;
		if( null == $factory ){
			$factory = new PhoneNumberFactory();
		}
		return $factory;
	}
		
 	/**
 	 *
 	 * Get Collection
 	 *
 	 * @return PhoneNumberCollection
 	 */
	public function newCollection() 
	{
		return new PhoneNumberCollection();
	}
		
 	/**
 	 *
 	 * Get Bean
 	 *
 	 * @return PhoneNumber
 	 */
	public function newBean() 
	{
		return new PhoneNumber();
	}
}
<?php

/**
 *
 * PersonBean
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Metadata
 * @copyright 
 * @license 
 * @created Mon Dec 9 11:22:30 2013
 * @version 1.0
 */

namespace Core\Model\Metadata;

use Model\Bean\AbstractBean;
use Model\Metadata\AbstractMetadata;
use Core\Model\Bean\Person;
use Core\Model\Factory\PersonFactory;
use Core\Model\Collection\PersonCollection;

class PersonMetadata extends AbstractMetadata
{

		
 	/**
 	 *
 	 * toUpdateArray
 	 *
 	 */
	public static function toUpdateArray(AbstractBean $bean) 
	{
		return $bean->toArrayFor(
			array(
				Person::ID_ADDRESS,
				Person::NAME,
				Person::LAST_NAME,
				Person::SECOND_LAST_NAME,
				Person::BIRTHDATE,
				Person::CURP,
				Person::TAX_REFERENCE,
				Person::REGISTRY_CORE,
				Person::GENDER,
				Person::MARITAL_STATUS,
			)
		);
	}
		
 	/**
 	 *
 	 * toCreateArray
 	 *
 	 */
	public static function toCreateArray(AbstractBean $bean) 
	{
		return $bean->toArrayFor(
			array(
				Person::ID_PERSON,
				Person::ID_ADDRESS,
				Person::NAME,
				Person::LAST_NAME,
				Person::SECOND_LAST_NAME,
				Person::BIRTHDATE,
				Person::CURP,
				Person::TAX_REFERENCE,
				Person::REGISTRY_CORE,
				Person::GENDER,
				Person::MARITAL_STATUS,
			)
		);
	}
		
 	/**
 	 *
 	 * Get fields
 	 *
 	 */
	public static function getFields() 
	{
		return array(
			Person::ID_PERSON,
			Person::ID_ADDRESS,
			Person::NAME,
			Person::LAST_NAME,
			Person::SECOND_LAST_NAME,
			Person::BIRTHDATE,
			Person::CURP,
			Person::TAX_REFERENCE,
			Person::REGISTRY_CORE,
			Person::GENDER,
			Person::MARITAL_STATUS,
		);
	}
		
 	/**
 	 *
 	 * Get Entity Name
 	 *
 	 * @return string
 	 */
	public static function getEntityName() 
	{
		return "Person";
	}
		
 	/**
 	 *
 	 * Get TableName
 	 *
 	 * @return string
 	 */
	public static function getTableName() 
	{
		return "common_persons";
	}
		
 	/**
 	 *
 	 * Get PrimaryKey
 	 *
 	 * @return string
 	 */
	public static function getPrimaryKey() 
	{
		return "id_person";
	}
		
 	/**
 	 *
 	 * Get Factory
 	 *
 	 * @return PersonFactory
 	 */
	public static function getFactory() 
	{
		static $factory = null;
		if( null == $factory ){
			$factory = new PersonFactory();
		}
		return $factory;
	}
		
 	/**
 	 *
 	 * Get Collection
 	 *
 	 * @return PersonCollection
 	 */
	public static function newCollection() 
	{
		return new PersonCollection();
	}
		
 	/**
 	 *
 	 * Get Bean
 	 *
 	 * @return Person
 	 */
	public static function newBean() 
	{
		return new Person();
	}
}
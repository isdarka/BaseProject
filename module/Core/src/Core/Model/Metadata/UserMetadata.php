<?php

/**
 *
 * UserBean
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
use Core\Model\Bean\User;
use Core\Model\Factory\UserFactory;
use Core\Model\Collection\UserCollection;

class UserMetadata extends AbstractMetadata
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
				User::STATUS,
				User::ID_PERSON,
				User::ID_ROLE,
				User::ID_FILE,
				User::USERNAME,
				User::PASSWORD,
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
				User::ID_USER,
				User::STATUS,
				User::ID_PERSON,
				User::ID_ROLE,
				User::ID_FILE,
				User::USERNAME,
				User::PASSWORD,
			)
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
		return "User";
	}
		
 	/**
 	 *
 	 * Get TableName
 	 *
 	 * @return string
 	 */
	public function getTableName() 
	{
		return "common_users";
	}
		
 	/**
 	 *
 	 * Get PrimaryKey
 	 *
 	 * @return string
 	 */
	public function getPrimaryKey() 
	{
		return "id_user";
	}
		
 	/**
 	 *
 	 * Get Factory
 	 *
 	 * @return UserFactory
 	 */
	public function getFactory() 
	{
		static $factory = null;
		if( null == $factory ){
			$factory = new UserFactory();
		}
		return $factory;
	}
		
 	/**
 	 *
 	 * Get Collection
 	 *
 	 * @return UserCollection
 	 */
	public function newCollection() 
	{
		return new UserCollection();
	}
		
 	/**
 	 *
 	 * Get Bean
 	 *
 	 * @return User
 	 */
	public function newBean() 
	{
		return new User();
	}
}
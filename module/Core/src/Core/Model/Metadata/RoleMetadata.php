<?php

/**
 *
 * RoleBean
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
use Core\Model\Bean\Role;
use Core\Model\Factory\RoleFactory;
use Core\Model\Collection\RoleCollection;

class RoleMetadata extends AbstractMetadata
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
				Role::NAME,
				Role::STATUS,
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
				Role::ID_ROLE,
				Role::NAME,
				Role::STATUS,
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
			Role::ID_ROLE,
			Role::NAME,
			Role::STATUS,
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
		return "Role";
	}
		
 	/**
 	 *
 	 * Get TableName
 	 *
 	 * @return string
 	 */
	public function getTableName() 
	{
		return "core_roles";
	}
		
 	/**
 	 *
 	 * Get PrimaryKey
 	 *
 	 * @return string
 	 */
	public function getPrimaryKey() 
	{
		return "id_role";
	}
		
 	/**
 	 *
 	 * Get Factory
 	 *
 	 * @return RoleFactory
 	 */
	public function getFactory() 
	{
		static $factory = null;
		if( null == $factory ){
			$factory = new RoleFactory();
		}
		return $factory;
	}
		
 	/**
 	 *
 	 * Get Collection
 	 *
 	 * @return RoleCollection
 	 */
	public function newCollection() 
	{
		return new RoleCollection();
	}
		
 	/**
 	 *
 	 * Get Bean
 	 *
 	 * @return Role
 	 */
	public function newBean() 
	{
		return new Role();
	}
}
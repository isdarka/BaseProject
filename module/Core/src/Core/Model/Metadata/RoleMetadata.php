<?php
/**
 *
 * @author isdarka
 * @created Nov 24, 2013 6:57:42 PM
 */

namespace Core\Model\Metadata;


use Model\Metadata\AbstractMetadata;
use Model\Bean\AbstractBean;
use Core\Model\Bean\Role;
use Core\Model\Factory\RoleFactory;
use Core\Model\Collection\RoleCollection;


class RoleMetadata extends AbstractMetadata
{
	/**
	 * 
	 * @param AbstractBean $bean
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
	 * @return string
	 */
	public function getTableName()
	{
		return "core_roles";
	}
	
	/**
	 * 
	 * @return string
	 */
	public function getPrimaryKey()
	{
		return 'id_role';
	}
	
	/**
	 * 
	 * @return string
	 */
	public function getEntityName()
	{
		return "Role";
	}
	
	/**
	 * 
	 * @return Ambigous <NULL, \Core\Model\Factory\RoleFactory>
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
	 * @return \Core\Model\Collection\RoleCollection
	 */
	public function newCollection(){
		return new RoleCollection();
	}
	
} 
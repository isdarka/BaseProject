<?php
/**
 *
 * @author isdarka
 * @created Nov 26, 2013 4:01:07 PM
 */

namespace Core\Model\Metadata;


use Model\Bean\AbstractBean;
use Core\Model\Bean\User;
use Core\Model\Factory\UserFactory;
use Model\Metadata\AbstractMetadata;
use Core\Model\Collection\UserCollection;
class UserMetadata extends AbstractMetadata
{
// 	/**
// 	 *
// 	 * @param AbstractBean $bean
// 	 */
// 	public function toUpdateArray(AbstractBean $bean)
// 	{
// 		return $bean->toArrayFor(
// 				array(User::ID_USER)
// 		);
// 	}

	/**
	 *
	 * @return string
	 */
	public function getEntityName()
	{
		return "User";
	}
	/**
	 *
	 * @return string
	 */
	public function getTableName()
	{
		return "common_users";
	}

	/**
	 *
	 * @return string
	 */
	public function getPrimaryKey()
	{
		return 'id_user';
	}

	/**
	 *
	 * @return ModuleFactory
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
	 * @return \Core\Model\Collection\ModuleCollection
	 */
	public function newCollection(){
		return new UserCollection();
	}
	
	
	
	
	
	
	public  function toUpdateArray(AbstractBean $bean){
		return $bean->toArrayFor(
				array('id_person', 'username', 'password', 'status', )
		);
	}
	
	/**
	 * @return array
	 */
	public function toCreateArray(AbstractBean $bean){
		return $bean->toArrayFor(
				array('id_user', 'id_person', 'username', 'password', 'status', )
		);
	}

}
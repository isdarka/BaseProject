<?php
/**
 *
 * @author isdarka
 * @created Nov 26, 2013 3:58:22 PM
 */

namespace Core\Model\Metadata;



use Model\Metadata\AbstractMetadata;
use Model\Bean\AbstractBean;
use Core\Model\Factory\LogFactory;
use Core\Model\Factory\UserLogFactory;
use Core\Model\Collection\UserLogCollection;

class UserLogMetadata extends AbstractMetadata
{

	/**
	 *
	 * @return string
	 */
	public function getEntityName()
	{
		return "UserLog";
	}
	/**
	 *
	 * @return string
	 */
	public function getTableName()
	{
		return "common_user_logs";
	}

	/**
	 *
	 * @return string
	 */
	public function getPrimaryKey()
	{
		return 'id_user_log';
	}

	/**
	 *
	 * @return ModuleFactory
	 */
	public function getFactory()
	{
		static $factory = null;
		if( null == $factory ){
			$factory = new UserLogFactory();
		}
		return $factory;
	}

	/**
	 *
	 * @return \Core\Model\Collection\ModuleCollection
	 */
	public function newCollection(){
		return new UserLogCollection();
	}

	public function toCreateArray(AbstractBean $bean){
		return $bean->toArrayFor(
				array('id_user_log', 'id_user', 'id_log', )
		);
	}
	
	public  function toUpdateArray(AbstractBean $bean){
		return $bean->toArrayFor(
				array('id_user', 'id_log',)
		);
	}
}
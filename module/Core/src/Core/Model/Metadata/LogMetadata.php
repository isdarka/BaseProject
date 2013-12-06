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
use Core\Model\Collection\LogCollection;

class LogMetadata extends AbstractMetadata
{

	/**
	 *
	 * @return string
	 */
	public function getEntityName()
	{
		return "Log";
	}
	/**
	 *
	 * @return string
	 */
	public function getTableName()
	{
		return "core_logs";
	}

	/**
	 *
	 * @return string
	 */
	public function getPrimaryKey()
	{
		return 'id_log';
	}

	/**
	 *
	 * @return ModuleFactory
	 */
	public function getFactory()
	{
		static $factory = null;
		if( null == $factory ){
			$factory = new LogFactory();
		}
		return $factory;
	}

	/**
	 *
	 * @return \Core\Model\Collection\ModuleCollection
	 */
	public function newCollection(){
		return new LogCollection();
	}

	public function toCreateArray(AbstractBean $bean){
		return $bean->toArrayFor(
				array('id_log', 'id_user', 'timestamp', 'event', 'note' )
		);
	}
	
	public  function toUpdateArray(AbstractBean $bean){
		return $bean->toArrayFor(
				array('id_user', 'timestamp', 'event', 'note' )
		);
	}
}
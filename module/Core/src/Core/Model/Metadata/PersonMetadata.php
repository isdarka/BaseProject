<?php
/**
 *
 * @author isdarka
 * @created Nov 26, 2013 3:58:22 PM
 */

namespace Core\Model\Metadata;



use Model\Metadata\AbstractMetadata;
use Model\Bean\AbstractBean;
use Core\Model\Bean\Person;
use Core\Model\Factory\PersonFactory;

class PersonMetadata extends AbstractMetadata
{

	/**
	 *
	 * @return string
	 */
	public function getEntityName()
	{
		return "Person";
	}
	/**
	 *
	 * @return string
	 */
	public function getTableName()
	{
		return "common_persons";
	}

	/**
	 *
	 * @return string
	 */
	public function getPrimaryKey()
	{
		return 'id_person';
	}

	/**
	 *
	 * @return ModuleFactory
	 */
	public function getFactory()
	{
		static $factory = null;
		if( null == $factory ){
			$factory = new PersonFactory();
		}
		return $factory;
	}

	/**
	 *
	 * @return \Core\Model\Collection\ModuleCollection
	 */
	public function newCollection(){
// 		return new Per();
	}

	public function toCreateArray(AbstractBean $bean){
		var_dump($bean);
		return $bean->toArrayFor(
				array('id_person', 'name', 'last_name', 'second_last_name', 'birthdate' )
		);
	}
	
	public  function toUpdateArray(AbstractBean $bean){
		return $bean->toArrayFor(
				array('name', 'last_name', 'second_last_name', 'birthdate' )
		);
	}
}
<?php
/**
 *
 * @author isdarka
 * @created Nov 24, 2013 6:57:42 PM
 */

namespace Core\Model\Metadata;


use Model\Metadata\AbstractMetadata;
use Model\Bean\AbstractBean;
use Core\Model\Bean\Action;
use Core\Model\Factory\ActionFactory;
use Core\Model\Collection\ActionCollection;


class ActionMetadata extends AbstractMetadata
{
	/**
	 * 
	 * @param AbstractBean $bean
	 */
	public function toUpdateArray(AbstractBean $bean)
	{
		return $bean->toArrayFor(
				array(
						Action::ID_CONTROLLER,
						Action::NAME,
				)
		);
	}
	
	/**
	 * 
	 * @return string
	 */
	public function getTableName()
	{
		return "core_actions";
	}
	
	/**
	 * 
	 * @return string
	 */
	public function getPrimaryKey()
	{
		return 'id_action';
	}
	
	/**
	 * 
	 * @return string
	 */
	public function getEntityName()
	{
		return "Action";
	}
	/**
	 * 
	 * @return ModuleFactory
	 */
	public function getFactory()
	{
		static $factory = null;
		if( null == $factory ){
			$factory = new ActionFactory();
		}
		return $factory;
	}
	
	/**
	 * 
	 * @return \Core\Model\Collection\ModuleCollection
	 */
	public function newCollection(){
		return new ActionCollection();
	}
	
} 
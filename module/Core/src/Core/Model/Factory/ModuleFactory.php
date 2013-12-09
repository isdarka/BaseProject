<?php
/**
 *
 * @author isdarka
 * @created Nov 24, 2013 7:44:45 PM
 */

namespace Core\Model\Factory;

use Model\Factory\AbstractFactory;
use Core\Model\Bean\ModuleBean;
use Core\Model\Exception\ModuleException;
use Model\Interfaces\FactoryInterface;

class ModuleFactory extends AbstractFactory //implements FactoryInterface
{
	/**
	 * 
	 * @param unknown $fields
	 * @return \Core\Model\Bean\ModuleBean
	 */
	public static function createFromArray($fields)
	{
		$module = new ModuleBean();
		self::populate($module, $fields);
	
		return $module;
	}
	
	/**
	 * 
	 * @param unknown $module
	 * @param unknown $fields
	 * @throws ModuleException
	 */
	public static function populate($module, $fields)
	{
		if( !($module instanceof ModuleBean) )
			throw new ModuleException('$module must be instance of ModuleBean');
	
		if( isset($fields[ModuleBean::ID_MODULE]) ){
			$module->setIdModule($fields[ModuleBean::ID_MODULE]);
		}
	
		if( isset($fields[ModuleBean::NAME]) ){
			$module->setName($fields[ModuleBean::NAME]);
		}
	}
}
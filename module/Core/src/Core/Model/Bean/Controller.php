<?php

/**
 *
 * ControllerBean
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Bean
 * @copyright 
 * @license 
 * @created Mon Dec 9 11:25:03 2013
 * @version 1.0
 */

namespace Core\Model\Bean;

use Model\Bean\AbstractBean;

class Controller extends AbstractBean
{

	const TABLENAME = 'core_controllers';

	const ID_CONTROLLER = 'id_controller';

	const ID_MODULE = 'id_module';

	const NAME = 'name';

	private $idController;

	private $idModule;

	private $name;

		
 	/**
 	 *
 	 * Get the idController property
 	 *
 	 * @return int $idController
 	 */
	public function getIndex() 
	{
		return $this->idController;
	}
		
 	/**
 	 *
 	 * Set the idController property
 	 *
 	 * @param int $idController
 	 */
	public function setIdController($idController) 
	{
		$this->idController = $idController;
		return $this;
	}
		
 	/**
 	 *
 	 * Set the idModule property
 	 *
 	 * @param int $idModule
 	 */
	public function setIdModule($idModule) 
	{
		$this->idModule = $idModule;
		return $this;
	}
		
 	/**
 	 *
 	 * Set the name property
 	 *
 	 * @param string $name
 	 */
	public function setName($name) 
	{
		$this->name = $name;
		return $this;
	}
		
 	/**
 	 *
 	 * Get the idController property
 	 *
 	 * @return int $idController
 	 */
	public function getIdController() 
	{
		return $this->idController;
	}
		
 	/**
 	 *
 	 * Get the idModule property
 	 *
 	 * @return int $idModule
 	 */
	public function getIdModule() 
	{
		return $this->idModule;
	}
		
 	/**
 	 *
 	 * Get the name property
 	 *
 	 * @return string $name
 	 */
	public function getName() 
	{
		return $this->name;
	}
		
 	/**
 	 *
 	 * Get the Array
 	 *
 	 * @return array
 	 */
	public function toArray() 
	{
		$array = array(
			self::ID_CONTROLLER => $this->getIdController(),
			self::ID_MODULE => $this->getIdModule(),
			self::NAME => $this->getName(),
		);
		return $array;
	}
}
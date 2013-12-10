<?php

/**
 *
 * ActionBean
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

class Action extends AbstractBean
{

	const TABLENAME = 'core_actions';

	const ID_ACTION = 'id_action';

	const ID_CONTROLLER = 'id_controller';

	const NAME = 'name';

	private $idAction;

	private $idController;

	private $name;

		
 	/**
 	 *
 	 * Get the idAction property
 	 *
 	 * @return int $idAction
 	 */
	public function getIndex() 
	{
		return $this->idAction;
	}
		
 	/**
 	 *
 	 * Set the idAction property
 	 *
 	 * @param int $idAction
 	 */
	public function setIdAction($idAction) 
	{
		$this->idAction = $idAction;
		return $this;
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
 	 * Get the idAction property
 	 *
 	 * @return int $idAction
 	 */
	public function getIdAction() 
	{
		return $this->idAction;
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
			self::ID_ACTION => $this->getIdAction(),
			self::ID_CONTROLLER => $this->getIdController(),
			self::NAME => $this->getName(),
		);
		return $array;
	}
}
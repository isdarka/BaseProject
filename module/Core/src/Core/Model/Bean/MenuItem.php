<?php

/**
 *
 * MenuItemBean
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

class MenuItem extends AbstractBean
{

	const TABLENAME = 'core_menu_items';

	const ID_MENU_ITEM = 'id_menu_item';

	const ID_ACTION = 'id_action';

	const ID_PARENT = 'id_parent';

	const NAME = 'name';

	const ORDER = 'order';

	const STATUS = 'status';

	const ENABLE = '1';

	const DISABLE = '2';

	private $idMenuItem;

	private $idAction;

	private $idParent;

	private $name;

	private $order;

	private $status = '1';

		
 	/**
 	 *
 	 * Get the idMenuItem property
 	 *
 	 * @return int $idMenuItem
 	 */
	public function getIndex() 
	{
		return $this->idMenuItem;
	}
		
 	/**
 	 *
 	 * Set the idMenuItem property
 	 *
 	 * @param int $idMenuItem
 	 */
	public function setIdMenuItem($idMenuItem) 
	{
		$this->idMenuItem = $idMenuItem;
		return $this;
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
 	 * Set the idParent property
 	 *
 	 * @param int $idParent
 	 */
	public function setIdParent($idParent) 
	{
		$this->idParent = $idParent;
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
 	 * Set the order property
 	 *
 	 * @param int $order
 	 */
	public function setOrder($order) 
	{
		$this->order = $order;
		return $this;
	}
		
 	/**
 	 *
 	 * Set the status property
 	 *
 	 * @param int $status
 	 */
	public function setStatus($status) 
	{
		$this->status = $status;
		return $this;
	}
		
 	/**
 	 *
 	 * Get the idMenuItem property
 	 *
 	 * @return int $idMenuItem
 	 */
	public function getIdMenuItem() 
	{
		return $this->idMenuItem;
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
 	 * Get the idParent property
 	 *
 	 * @return int $idParent
 	 */
	public function getIdParent() 
	{
		return $this->idParent;
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
 	 * Get the order property
 	 *
 	 * @return int $order
 	 */
	public function getOrder() 
	{
		return $this->order;
	}
		
 	/**
 	 *
 	 * Get the status property
 	 *
 	 * @return int $status
 	 */
	public function getStatus() 
	{
		return $this->status;
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
			self::ID_MENU_ITEM => $this->getIdMenuItem(),
			self::ID_ACTION => $this->getIdAction(),
			self::ID_PARENT => $this->getIdParent(),
			self::NAME => $this->getName(),
			self::ORDER => $this->getOrder(),
			self::STATUS => $this->getStatus(),
		);
		return $array;
	}
		
 	/**
 	 *
 	 * Statuses
 	 *
 	 */
	public static $statuses = array( 
		self::ENABLE => "Enable", 
		self::DISABLE => "Disable", 
	
	);
		
 	/**
 	 *
 	 * idMenuItem is enable
 	 *
 	 * @return boolean
 	 */
	public function isEnabled() 
	{
		return self::ENABLE == $this->getStatus();
	}
		
 	/**
 	 *
 	 * idMenuItem is disable
 	 *
 	 * @return boolean
 	 */
	public function isDisabled() 
	{
		return self::DISABLE == $this->getStatus();
	}
		
 	/**
 	 *
 	 * Get Status Name
 	 *
 	 * @return string
 	 */
	public function getStatusString() 
	{
		return self::$statuses[$this->getStatus()];
	}
}
<?php

/**
 *
 * MenuItemLogBean
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


class MenuItemLog extends Log
{

	const TABLENAME = 'core_menu_item_logs';

	const ID_MENU_ITEM_LOG = 'id_menu_item_log';

	const ID_MENU_ITEM = 'id_menu_item';

	const ID_LOG = 'id_log';

	private $idMenuItemLog;

	private $idMenuItem;

	private $idLog;

		
 	/**
 	 *
 	 * Get the idMenuItemLog property
 	 *
 	 * @return int $idMenuItemLog
 	 */
	public function getIndex() 
	{
		return $this->idMenuItemLog;
	}
		
 	/**
 	 *
 	 * Set the idMenuItemLog property
 	 *
 	 * @param int $idMenuItemLog
 	 */
	public function setIdMenuItemLog($idMenuItemLog) 
	{
		$this->idMenuItemLog = $idMenuItemLog;
		return $this;
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
 	 * Set the idLog property
 	 *
 	 * @param int $idLog
 	 */
	public function setIdLog($idLog) 
	{
		$this->idLog = $idLog;
		return $this;
	}
		
 	/**
 	 *
 	 * Get the idMenuItemLog property
 	 *
 	 * @return int $idMenuItemLog
 	 */
	public function getIdMenuItemLog() 
	{
		return $this->idMenuItemLog;
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
 	 * Get the idLog property
 	 *
 	 * @return int $idLog
 	 */
	public function getIdLog() 
	{
		return $this->idLog;
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
			self::ID_MENU_ITEM_LOG => $this->getIdMenuItemLog(),
			self::ID_MENU_ITEM => $this->getIdMenuItem(),
			self::ID_LOG => $this->getIdLog(),
		);
		return array_merge(parent::toArray(), $array);
	}
}
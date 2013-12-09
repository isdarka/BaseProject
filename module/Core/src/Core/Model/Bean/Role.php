<?php

/**
 *
 * RoleBean
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Bean
 * @copyright 
 * @license 
 * @created Sun Dec 8 19:21:50 2013
 * @version 1.0
 */

namespace Core\Model\Bean;

use Model\Bean\AbstractBean;

class Role extends AbstractBean
{

	const TABLENAME = 'core_roles';

	const ID_ROLE = 'id_role';

	const NAME = 'name';

	const STATUS = 'status';

	const ENABLE = '1';

	const DISABLE = '2';

	private $idRole;

	private $name;

	private $status = '1';

		
 	/**
 	 *
 	 * Get the idRole property
 	 *
 	 * @return int $idRole
 	 */
	public function getIndex() 
	{
		return $this->idRole;
	}
		
 	/**
 	 *
 	 * Set the idRole property
 	 *
 	 * @param int $idRole
 	 */
	public function setIdRole($idRole) 
	{
		$this->idRole = $idRole;
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
 	 * Get the idRole property
 	 *
 	 * @return int $idRole
 	 */
	public function getIdRole() 
	{
		return $this->idRole;
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
			self::ID_ROLE => $this->getIdRole(),
			self::NAME => $this->getName(),
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
 	 * idRole is enable
 	 *
 	 * @return boolean
 	 */
	public function isEnabled() 
	{
		return self::ENABLE == $this->getStatus();
	}
		
 	/**
 	 *
 	 * idRole is disable
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
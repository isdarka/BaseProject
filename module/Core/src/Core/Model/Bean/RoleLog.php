<?php

/**
 *
 * RoleLogBean
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


class RoleLog extends Log
{

	const TABLENAME = 'core_role_logs';

	const ID_ROLE_LOG = 'id_role_log';

	const ID_ROLE = 'id_role';

	const ID_LOG = 'id_log';

	private $idRoleLog;

	private $idRole;

	private $idLog;

		
 	/**
 	 *
 	 * Get the idRoleLog property
 	 *
 	 * @return int $idRoleLog
 	 */
	public function getIndex() 
	{
		return $this->idRoleLog;
	}
		
 	/**
 	 *
 	 * Set the idRoleLog property
 	 *
 	 * @param int $idRoleLog
 	 */
	public function setIdRoleLog($idRoleLog) 
	{
		$this->idRoleLog = $idRoleLog;
		return $this;
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
 	 * Get the idRoleLog property
 	 *
 	 * @return int $idRoleLog
 	 */
	public function getIdRoleLog() 
	{
		return $this->idRoleLog;
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
			self::ID_ROLE_LOG => $this->getIdRoleLog(),
			self::ID_ROLE => $this->getIdRole(),
			self::ID_LOG => $this->getIdLog(),
		);
		return array_merge(parent::toArray(), $array);
	}
}
<?php

/**
 *
 * UserLogBean
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


class UserLog extends Log
{

	const TABLENAME = 'common_user_logs';

	const ID_USER_LOG = 'id_user_log';

	const ID_USER = 'id_user';

	const ID_LOG = 'id_log';

	private $idUserLog;

	private $idUser;

	private $idLog;

		
 	/**
 	 *
 	 * Get the idUserLog property
 	 *
 	 * @return int $idUserLog
 	 */
	public function getIndex() 
	{
		return $this->idUserLog;
	}
		
 	/**
 	 *
 	 * Set the idUserLog property
 	 *
 	 * @param int $idUserLog
 	 */
	public function setIdUserLog($idUserLog) 
	{
		$this->idUserLog = $idUserLog;
		return $this;
	}
		
 	/**
 	 *
 	 * Set the idUser property
 	 *
 	 * @param int $idUser
 	 */
	public function setIdUser($idUser) 
	{
		$this->idUser = $idUser;
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
 	 * Get the idUserLog property
 	 *
 	 * @return int $idUserLog
 	 */
	public function getIdUserLog() 
	{
		return $this->idUserLog;
	}
		
 	/**
 	 *
 	 * Get the idUser property
 	 *
 	 * @return int $idUser
 	 */
	public function getIdUser() 
	{
		return $this->idUser;
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
			self::ID_USER_LOG => $this->getIdUserLog(),
			self::ID_USER => $this->getIdUser(),
			self::ID_LOG => $this->getIdLog(),
		);
		return array_merge(parent::toArray(), $array);
	}
}
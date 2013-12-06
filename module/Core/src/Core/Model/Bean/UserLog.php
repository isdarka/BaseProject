<?php
/**
 *
 * @author isdarka
 * @created Nov 29, 2013 11:10:27 AM
 */
namespace Core\Model\Bean;

class UserLog extends Log
{
	const TABLENAME = "common_user_logs";
	
	const ID_USER_LOG = 'id_user_log';
	const ID_USER = 'id_user';
	const ID_LOG = 'id_log';

	private $idUserLog;
	private $idUser;
	private $idLog;
	
	public function getIndex()
	{
		return $this->idUserLog;
	}
	
	public function setIdUserLog($idUserLog)
	{
		$this->idUserLog = $idUserLog;
		return $this;
	}
	
	public function getIdUserLog()
	{
		return $this->idUserLog;
	}
	
	public function setIdUser($idUser)
	{
		$this->idUser = $idUser;
		return $this;
	}
	
	public function getIdUser()
	{
		return $this->idUser;
	}
	
	public function setIdLog($idLog)
	{
		$this->idLog = $idLog;
		return $this;
	}
	
	public function getIdLog()
	{
		return $this->idLog;
	}
	
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
<?php
/**
 *
 * @author isdarka
 * @created Nov 26, 2013 1:26:22 PM
 */
namespace Core\Model\Bean;

class User extends Person
{
	const TABLENAME =  'common_users';
	
	const ID_USER = 'id_user';
	const STATUS = 'status';
	const ID_PERSON = 'id_person';
	const USERNAME = 'username';
	const PASSWORD = 'password';
	
	const ENABLE = 1;
	const DISABLE = 0;
	private $idUser;
	private $status;
	private $idPerson;
	private $username;
	private $password;

	public function getIndex()
	{
		return $this->idUser;
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
	
	public function setStatus($status)
	{
		$this->status = (int) $status;
		return $this;
	}
	
	public function getStatus()
	{
		return $this->status;
	}
	
	public function setIdPerson($idPerson)
	{
		$this->idPerson = (int) $idPerson;
		return $this;
	}
	
	public function getIdPerson()
	{
		return $this->idPerson;
	}
	
	public function setUsername($username)
	{
		$this->username = $username;
		return $this;
	}
	
	public function getUsername()
	{
		return $this->username;
	}
	
	public function setPassword($password)
	{
		$this->password = $password;
		return $this;
	}
	
	public function getPassword()
	{
		return $this->password;
	}
	
	
	public function toArray()
	{
		$array = array(
				self::ID_USER => $this->getIdUser(),
				self::ID_PERSON => $this->getIdPerson(),
				self::STATUS => $this->getStatus(),
				self::USERNAME => $this->getUsername(),
				self::PASSWORD => $this->getPassword(),
		);
		
		return array_merge(parent::toArray(), $array);
	}
	
	public static $statusString = array(
			self::ENABLE => 'Enabled',
			self::DISABLE => 'Disabled',
		
	);
	public function isEnabled()
	{
		return self::ENABLE == $this->getStatus();
	}
	
	public function isDisabled()
	{
		return self::DISABLE == $this->getStatus();
	}
	
	public function getStatusString()
	{
		return self::$statusString[$this->getStatus()];
	}
}
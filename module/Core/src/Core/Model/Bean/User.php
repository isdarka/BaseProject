<?php

/**
 *
 * UserBean
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


class User extends Person
{

	const TABLENAME = 'common_users';

	const ID_USER = 'id_user';

	const STATUS = 'status';

	const ID_PERSON = 'id_person';

	const ID_ROLE = 'id_role';

	const ID_FILE = 'id_file';

	const USERNAME = 'username';

	const PASSWORD = 'password';

	const ENABLE = '1';

	const DISABLE = '2';

	private $idUser;

	private $status = '1';

	private $idPerson;

	private $idRole;

	private $idFile;

	private $username;

	private $password;

		
 	/**
 	 *
 	 * Get the idUser property
 	 *
 	 * @return int $idUser
 	 */
	public function getIndex() 
	{
		return $this->idUser;
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
 	 * Set the idPerson property
 	 *
 	 * @param int $idPerson
 	 */
	public function setIdPerson($idPerson) 
	{
		$this->idPerson = $idPerson;
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
 	 * Set the idFile property
 	 *
 	 * @param int $idFile
 	 */
	public function setIdFile($idFile) 
	{
		$this->idFile = $idFile;
		return $this;
	}
		
 	/**
 	 *
 	 * Set the username property
 	 *
 	 * @param string $username
 	 */
	public function setUsername($username) 
	{
		$this->username = $username;
		return $this;
	}
		
 	/**
 	 *
 	 * Set the password property
 	 *
 	 * @param string $password
 	 */
	public function setPassword($password) 
	{
		$this->password = $password;
		return $this;
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
 	 * Get the idPerson property
 	 *
 	 * @return int $idPerson
 	 */
	public function getIdPerson() 
	{
		return $this->idPerson;
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
 	 * Get the idFile property
 	 *
 	 * @return int $idFile
 	 */
	public function getIdFile() 
	{
		return $this->idFile;
	}
		
 	/**
 	 *
 	 * Get the username property
 	 *
 	 * @return string $username
 	 */
	public function getUsername() 
	{
		return $this->username;
	}
		
 	/**
 	 *
 	 * Get the password property
 	 *
 	 * @return string $password
 	 */
	public function getPassword() 
	{
		return $this->password;
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
			self::ID_USER => $this->getIdUser(),
			self::STATUS => $this->getStatus(),
			self::ID_PERSON => $this->getIdPerson(),
			self::ID_ROLE => $this->getIdRole(),
			self::ID_FILE => $this->getIdFile(),
			self::USERNAME => $this->getUsername(),
			self::PASSWORD => $this->getPassword(),
		);
		return array_merge(parent::toArray(), $array);
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
 	 * idUser is enable
 	 *
 	 * @return boolean
 	 */
	public function isEnabled() 
	{
		return self::ENABLE == $this->getStatus();
	}
		
 	/**
 	 *
 	 * idUser is disable
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
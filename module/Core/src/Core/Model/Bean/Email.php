<?php

/**
 *
 * EmailBean
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Bean
 * @copyright 
 * @license 
 * @created Wed Dec 11 09:36:19 2013
 * @version 1.0
 */

namespace Core\Model\Bean;

use Model\Bean\AbstractBean;

class Email extends AbstractBean
{

	const TABLENAME = 'common_emails';

	const ID_EMAIL = 'id_email';

	const EMAIL = 'email';

	private $idEmail;

	private $email;

		
 	/**
 	 *
 	 * Get the idEmail property
 	 *
 	 * @return int $idEmail
 	 */
	public function getIndex() 
	{
		return $this->idEmail;
	}
		
 	/**
 	 *
 	 * Set the idEmail property
 	 *
 	 * @param int $idEmail
 	 */
	public function setIdEmail($idEmail) 
	{
		$this->idEmail = $idEmail;
		return $this;
	}
		
 	/**
 	 *
 	 * Set the email property
 	 *
 	 * @param string $email
 	 */
	public function setEmail($email) 
	{
		$this->email = $email;
		return $this;
	}
		
 	/**
 	 *
 	 * Get the idEmail property
 	 *
 	 * @return int $idEmail
 	 */
	public function getIdEmail() 
	{
		return $this->idEmail;
	}
		
 	/**
 	 *
 	 * Get the email property
 	 *
 	 * @return string $email
 	 */
	public function getEmail() 
	{
		return $this->email;
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
			self::ID_EMAIL => $this->getIdEmail(),
			self::EMAIL => $this->getEmail(),
		);
		return $array;
	}
}
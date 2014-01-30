<?php

/**
 *
 * UserMessageBean
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Bean
 * @copyright 
 * @license 
 * @created Wed Jan 29 14:40:50 2014
 * @version 1.0
 */

namespace Core\Model\Bean;

use Model\Bean\AbstractBean;

class UserMessage extends AbstractBean
{

	const TABLENAME = 'common_users_messages';

	const ID_USER_MESSAGE = 'id_user_message';

	const STATUS = 'status';

	const ID_USER = 'id_user';

	const ID_MESSAGE = 'id_message';

	const UNREAD = '1';

	const READ = '2';

	private $idUserMessage;

	private $status = '1';

	private $idUser;

	private $idMessage;

		
 	/**
 	 *
 	 * Get the idUserMessage property
 	 *
 	 * @return int $idUserMessage
 	 */
	public function getIndex() 
	{
		return $this->idUserMessage;
	}
		
 	/**
 	 *
 	 * Set the idUserMessage property
 	 *
 	 * @param int $idUserMessage
 	 */
	public function setIdUserMessage($idUserMessage) 
	{
		$this->idUserMessage = $idUserMessage;
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
 	 * Set the idMessage property
 	 *
 	 * @param int $idMessage
 	 */
	public function setIdMessage($idMessage) 
	{
		$this->idMessage = $idMessage;
		return $this;
	}
		
 	/**
 	 *
 	 * Get the idUserMessage property
 	 *
 	 * @return int $idUserMessage
 	 */
	public function getIdUserMessage() 
	{
		return $this->idUserMessage;
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
 	 * Get the idMessage property
 	 *
 	 * @return int $idMessage
 	 */
	public function getIdMessage() 
	{
		return $this->idMessage;
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
			self::ID_USER_MESSAGE => $this->getIdUserMessage(),
			self::STATUS => $this->getStatus(),
			self::ID_USER => $this->getIdUser(),
			self::ID_MESSAGE => $this->getIdMessage(),
		);
		return $array;
	}
		
 	/**
 	 *
 	 * Statuses
 	 *
 	 */
	public static $statuses = array( 
		self::READ => "Read", 
		self::UNREAD => "Unread", 
	
	);
		
 	/**
 	 *
 	 * idUserMessage is enable
 	 *
 	 * @return boolean
 	 */
	public function isRead() 
	{
		return self::READ == $this->getStatus();
	}
		
 	/**
 	 *
 	 * idUserMessage is disable
 	 *
 	 * @return boolean
 	 */
	public function isUnread() 
	{
		return self::UNREAD == $this->getStatus();
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
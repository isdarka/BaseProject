<?php

/**
 *
 * MessageBean
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Bean
 * @copyright 
 * @license 
 * @created Wed Jan 29 11:40:44 2014
 * @version 1.0
 */

namespace Core\Model\Bean;

use Model\Bean\AbstractBean;

class Message extends AbstractBean
{

	const TABLENAME = 'common_messages';

	const ID_MESSAGE = 'id_message';

	const ID_USER = 'id_user';

	const STATUS = 'status';

	const TIMESTAMP = 'timestamp';

	const SUBJECT = 'subject';

	const MESSAGE = 'message';

	const ENABLE = '1';

	const DISABLE = '2';

	private $idMessage;

	private $idUser;

	private $status = '1';

	private $timestamp;

	private $subject;

	private $message;

		
 	/**
 	 *
 	 * Get the idMessage property
 	 *
 	 * @return int $idMessage
 	 */
	public function getIndex() 
	{
		return $this->idMessage;
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
 	 * Set the timestamp property
 	 *
 	 * @param $timestamp
 	 */
	public function setTimestamp($timestamp) 
	{
		$this->timestamp = $timestamp;
		return $this;
	}
		
 	/**
 	 *
 	 * Set the subject property
 	 *
 	 * @param string $subject
 	 */
	public function setSubject($subject) 
	{
		$this->subject = $subject;
		return $this;
	}
		
 	/**
 	 *
 	 * Set the message property
 	 *
 	 * @param string $message
 	 */
	public function setMessage($message) 
	{
		$this->message = $message;
		return $this;
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
 	 * Get the timestamp property
 	 *
 	 * @return Zend_Date $timestamp
 	 */
	public function getTimestamp() 
	{
		return $this->timestamp;
	}
		
 	/**
 	 *
 	 * Get the subject property
 	 *
 	 * @return string $subject
 	 */
	public function getSubject() 
	{
		return $this->subject;
	}
		
 	/**
 	 *
 	 * Get the message property
 	 *
 	 * @return string $message
 	 */
	public function getMessage() 
	{
		return $this->message;
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
			self::ID_MESSAGE => $this->getIdMessage(),
			self::ID_USER => $this->getIdUser(),
			self::STATUS => $this->getStatus(),
			self::TIMESTAMP => $this->getTimestamp(),
			self::SUBJECT => $this->getSubject(),
			self::MESSAGE => $this->getMessage(),
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
 	 * idMessage is enable
 	 *
 	 * @return boolean
 	 */
	public function isEnabled() 
	{
		return self::ENABLE == $this->getStatus();
	}
		
 	/**
 	 *
 	 * idMessage is disable
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
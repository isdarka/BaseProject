<?php

/**
 *
 * LogBean
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

use Model\Bean\AbstractBean;

class Log extends AbstractBean
{

	const TABLENAME = 'core_logs';

	const ID_LOG = 'id_log';

	const ID_USER = 'id_user';

	const TIMESTAMP = 'timestamp';

	const EVENT = 'event';

	const NOTE = 'note';

	private $idLog;

	private $idUser;

	private $timestamp = 'CURRENT_TIMESTAMP';

	private $event;

	private $note;

		
 	/**
 	 *
 	 * Get the idLog property
 	 *
 	 * @return int $idLog
 	 */
	public function getIndex() 
	{
		return $this->idLog;
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
 	 * Set the event property
 	 *
 	 * @param int $event
 	 */
	public function setEvent($event) 
	{
		$this->event = $event;
		return $this;
	}
		
 	/**
 	 *
 	 * Set the note property
 	 *
 	 * @param string $note
 	 */
	public function setNote($note) 
	{
		$this->note = $note;
		return $this;
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
 	 * Get the event property
 	 *
 	 * @return int $event
 	 */
	public function getEvent() 
	{
		return $this->event;
	}
		
	public function getEventString()
	{
		return self::$events[$this->getEvent()];
	}
 	/**
 	 *
 	 * Get the note property
 	 *
 	 * @return string $note
 	 */
	public function getNote() 
	{
		return $this->note;
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
			self::ID_LOG => $this->getIdLog(),
			self::ID_USER => $this->getIdUser(),
			self::TIMESTAMP => $this->getTimestamp(),
			self::EVENT => $this->getEvent(),
			self::NOTE => $this->getNote(),
		);
		return $array;
	}
	
	const ENABLED = 1;
	const DISABLED = 2;
	const CREATED = 3;
	const UPDATED = 4;
	
	public static $events = array(
			self::ENABLED => 'Enabled',
			self::DISABLED => 'Disabled',
			self::CREATED => 'Created',
			self::UPDATED => 'Updated',
	);
}
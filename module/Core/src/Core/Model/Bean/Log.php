<?php
/**
 *
 * @author isdarka
 * @created Nov 29, 2013 10:55:21 AM
 */

namespace Core\Model\Bean;

use Model\Bean\AbstractBean;
class Log extends AbstractBean
{
	const TABLENAME = "core_logs";
	
	const ID_LOG = "id_log";
	const ID_USER = "id_user";
	const TIMESTAMP = "timestamp";
	const EVENT = "event";
	const NOTE = "note";
	
	private $idLog;
	private $idUser;
	private $timestamp;
	private $event;
	private $note;
	
	public function getIndex()
	{
		return $this->idLog;
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
	
	public function setIdUser($idUser)
	{
		$this->idUser = $idUser;
		return $this;
	}
	
	public function getIdUser()
	{
		return $this->idUser;
	}
	
	public function setTimestamp($timestamp)
	{
		$this->timestamp = $timestamp;
		return $this;
	}
	
	public function getTimestamp()
	{
		return $this->timestamp;
	}
	
	public function setEvent($event)
	{
		$this->event = $event;
		return $this;
	}
	
	public function getEvent()
	{
		return $this->event;
	}
	
	public function getEventString()
	{
		return self::$events[$this->getEvent()];
	}
	
	public function setNote($note)
	{
		$this->note = $note;
		return $this;
	}
	
	public function getNote()
	{
		return $this->note;
	}
	
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
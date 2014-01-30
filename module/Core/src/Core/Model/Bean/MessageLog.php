<?php

/**
 *
 * MessageLogBean
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Bean
 * @copyright 
 * @license 
 * @created Wed Jan 29 11:43:50 2014
 * @version 1.0
 */

namespace Core\Model\Bean;


class MessageLog extends Log
{

	const TABLENAME = 'common_messages_logs';

	const ID_MESSAGE_LOG = 'id_message_log';

	const ID_MESSAGE = 'id_message';

	const ID_LOG = 'id_log';

	private $idMessageLog;

	private $idMessage;

	private $idLog;

		
 	/**
 	 *
 	 * Get the idMessageLog property
 	 *
 	 * @return int $idMessageLog
 	 */
	public function getIndex() 
	{
		return $this->idMessageLog;
	}
		
 	/**
 	 *
 	 * Set the idMessageLog property
 	 *
 	 * @param int $idMessageLog
 	 */
	public function setIdMessageLog($idMessageLog) 
	{
		$this->idMessageLog = $idMessageLog;
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
 	 * Get the idMessageLog property
 	 *
 	 * @return int $idMessageLog
 	 */
	public function getIdMessageLog() 
	{
		return $this->idMessageLog;
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
			self::ID_MESSAGE_LOG => $this->getIdMessageLog(),
			self::ID_MESSAGE => $this->getIdMessage(),
			self::ID_LOG => $this->getIdLog(),
		);
		return array_merge(parent::toArray(), $array);
	}
}
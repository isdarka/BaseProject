<?php

/**
 *
 * MessageLogBean
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Collection
 * @copyright 
 * @license 
 * @created Wed Jan 29 11:43:50 2014
 * @version 1.0
 */

namespace Core\Model\Collection;

use Core\Model\Bean\MessageLog;

class MessageLogCollection extends LogCollection
{

		
 	/**
 	 *
 	 * Get Ids
 	 *
 	 * @return array
 	 */
	public function getMessageIds() 
	{
		return $this->map(function(MessageLog $messageLog){
			return array($messageLog->getIdMessage() => $messageLog->getIdMessage());
		});
	}
		
 	/**
 	 *
 	 * Get Ids
 	 *
 	 * @return MessageLogCollection
 	 */
	public function getByIdMessage($idMessage) 
	{
		$messageLogCollection = new MessageLogCollection();
		$this->each(function(MessageLog $messageLog) use ($idMessage, $messageLogCollection){
			if($messageLog->getIdMessage() == $idMessage)
				$messageLogCollection->append($messageLog);
		});
		return $messageLogCollection;
	}
		
 	/**
 	 *
 	 * Get Ids
 	 *
 	 * @return array
 	 */
	public function getLogIds() 
	{
		return $this->map(function(MessageLog $messageLog){
			return array($messageLog->getIdLog() => $messageLog->getIdLog());
		});
	}
		
 	/**
 	 *
 	 * Get Ids
 	 *
 	 * @return MessageLogCollection
 	 */
	public function getByIdLog($idLog) 
	{
		$messageLogCollection = new MessageLogCollection();
		$this->each(function(MessageLog $messageLog) use ($idLog, $messageLogCollection){
			if($messageLog->getIdLog() == $idLog)
				$messageLogCollection->append($messageLog);
		});
		return $messageLogCollection;
	}
}
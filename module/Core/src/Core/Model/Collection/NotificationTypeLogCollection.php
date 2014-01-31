<?php

/**
 *
 * NotificationTypeLogBean
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Collection
 * @copyright 
 * @license 
 * @created Fri Jan 31 09:48:50 2014
 * @version 1.0
 */

namespace Core\Model\Collection;

use Core\Model\Bean\NotificationTypeLog;

class NotificationTypeLogCollection extends LogCollection
{

		
 	/**
 	 *
 	 * Get Ids
 	 *
 	 * @return array
 	 */
	public function getNotificationTypeIds() 
	{
		return $this->map(function(NotificationTypeLog $notificationTypeLog){
			return array($notificationTypeLog->getIdNotificationType() => $notificationTypeLog->getIdNotificationType());
		});
	}
		
 	/**
 	 *
 	 * Get Ids
 	 *
 	 * @return NotificationTypeLogCollection
 	 */
	public function getByIdNotificationType($idNotificationType) 
	{
		$notificationTypeLogCollection = new NotificationTypeLogCollection();
		$this->each(function(NotificationTypeLog $notificationTypeLog) use ($idNotificationType, $notificationTypeLogCollection){
			if($notificationTypeLog->getIdNotificationType() == $idNotificationType)
				$notificationTypeLogCollection->append($notificationTypeLog);
		});
		return $notificationTypeLogCollection;
	}
		
 	/**
 	 *
 	 * Get Ids
 	 *
 	 * @return array
 	 */
	public function getLogIds() 
	{
		return $this->map(function(NotificationTypeLog $notificationTypeLog){
			return array($notificationTypeLog->getIdLog() => $notificationTypeLog->getIdLog());
		});
	}
		
 	/**
 	 *
 	 * Get Ids
 	 *
 	 * @return NotificationTypeLogCollection
 	 */
	public function getByIdLog($idLog) 
	{
		$notificationTypeLogCollection = new NotificationTypeLogCollection();
		$this->each(function(NotificationTypeLog $notificationTypeLog) use ($idLog, $notificationTypeLogCollection){
			if($notificationTypeLog->getIdLog() == $idLog)
				$notificationTypeLogCollection->append($notificationTypeLog);
		});
		return $notificationTypeLogCollection;
	}
}
<?php

/**
 *
 * NotificationBean
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

use Core\Model\Bean\Notification;
use Model\Collection\AbstractCollection;

class NotificationCollection extends AbstractCollection
{

		
 	/**
 	 *
 	 * Get Ids
 	 *
 	 * @return array
 	 */
	public function getNotificationTypeIds() 
	{
		return $this->map(function(Notification $notification){
			return array($notification->getIdNotificationType() => $notification->getIdNotificationType());
		});
	}
		
 	/**
 	 *
 	 * Get Ids
 	 *
 	 * @return NotificationCollection
 	 */
	public function getByIdNotificationType($idNotificationType) 
	{
		$notificationCollection = new NotificationCollection();
		$this->each(function(Notification $notification) use ($idNotificationType, $notificationCollection){
			if($notification->getIdNotificationType() == $idNotificationType)
				$notificationCollection->append($notification);
		});
		return $notificationCollection;
	}
}
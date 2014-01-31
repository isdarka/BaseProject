<?php

/**
 *
 * NotificationBean
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Factory
 * @copyright 
 * @license 
 * @created Fri Jan 31 09:48:50 2014
 * @version 1.0
 */

namespace Core\Model\Factory;

use Core\Model\Bean\Notification;
use Model\Factory\AbstractFactory;
use Core\Model\Exception\NotificationException;

class NotificationFactory extends AbstractFactory
{

		
 	/**
 	 *
 	 * Create Notification from array
 	 *
 	 * @return Notification
 	 */
	public static  function createFromArray($fields) 
	{
		$notification = new Notification();
		self::populate($notification,$fields);
		return $notification;
	}
		
 	/**
 	 *
 	 * Populate Notification
 	 *
 	 */
	public static  function populate($notification, $fields) 
	{
		if(!($notification instanceof Notification))
			throw new NotificationException('$notification must be instance of Notification');
		
		if($fields instanceof \stdClass)
		{
			$factory = self::getInstance();
			$stdClass = clone $fields;
			$fields = array();
			foreach ($stdClass as $key => $value)
				$fields[$factory->getUnderscore($key)] = $value;
		}
		
		if(isset($fields[Notification::ID_NOTIFICATION])){
			$notification->setIdNotification($fields[Notification::ID_NOTIFICATION]);
		}
		
		if(isset($fields[Notification::ID_NOTIFICATION_TYPE])){
			$notification->setIdNotificationType($fields[Notification::ID_NOTIFICATION_TYPE]);
		}
		
		if(isset($fields[Notification::STATUS])){
			$notification->setStatus($fields[Notification::STATUS]);
		}
		
		if(isset($fields[Notification::CREATED])){
			$notification->setCreated($fields[Notification::CREATED]);
		}
		
		if(isset($fields[Notification::DISPATCHED]) && !empty($fields[Notification::DISPATCHED])){
			$notification->setDispatched($fields[Notification::DISPATCHED]);
		}
		
		if(isset($fields[Notification::VARIABLES]) && !empty($fields[Notification::VARIABLES])){
			$notification->setVariables($fields[Notification::VARIABLES]);
		}
		
	}
}
<?php

/**
 *
 * NotificationTypeLogBean
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

use Core\Model\Bean\NotificationTypeLog;
use Core\Model\Exception\NotificationTypeLogException;

class NotificationTypeLogFactory extends LogFactory
{

		
 	/**
 	 *
 	 * Create NotificationTypeLog from array
 	 *
 	 * @return NotificationTypeLog
 	 */
	public static  function createFromArray($fields) 
	{
		$notificationTypeLog = new NotificationTypeLog();
		self::populate($notificationTypeLog,$fields);
		return $notificationTypeLog;
	}
		
 	/**
 	 *
 	 * Populate NotificationTypeLog
 	 *
 	 */
	public static  function populate($notificationTypeLog, $fields) 
	{
		parent::populate($notificationTypeLog, $fields);
		if(!($notificationTypeLog instanceof NotificationTypeLog))
			throw new NotificationTypeLogException('$notificationTypeLog must be instance of NotificationTypeLog');
		
		if($fields instanceof \stdClass)
		{
			$factory = self::getInstance();
			$stdClass = clone $fields;
			$fields = array();
			foreach ($stdClass as $key => $value)
				$fields[$factory->getUnderscore($key)] = $value;
		}
		
		if(isset($fields[NotificationTypeLog::ID_NOTIFICATION_TYPE_LOG])){
			$notificationTypeLog->setIdNotificationTypeLog($fields[NotificationTypeLog::ID_NOTIFICATION_TYPE_LOG]);
		}
		
		if(isset($fields[NotificationTypeLog::ID_NOTIFICATION_TYPE])){
			$notificationTypeLog->setIdNotificationType($fields[NotificationTypeLog::ID_NOTIFICATION_TYPE]);
		}
		
		if(isset($fields[NotificationTypeLog::ID_LOG])){
			$notificationTypeLog->setIdLog($fields[NotificationTypeLog::ID_LOG]);
		}
		
	}
}
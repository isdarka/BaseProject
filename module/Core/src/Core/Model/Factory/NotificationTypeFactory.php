<?php

/**
 *
 * NotificationTypeBean
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

use Core\Model\Bean\NotificationType;
use Model\Factory\AbstractFactory;
use Core\Model\Exception\NotificationTypeException;

class NotificationTypeFactory extends AbstractFactory
{

		
 	/**
 	 *
 	 * Create NotificationType from array
 	 *
 	 * @return NotificationType
 	 */
	public static  function createFromArray($fields) 
	{
		$notificationType = new NotificationType();
		self::populate($notificationType,$fields);
		return $notificationType;
	}
		
 	/**
 	 *
 	 * Populate NotificationType
 	 *
 	 */
	public static  function populate($notificationType, $fields) 
	{
		if(!($notificationType instanceof NotificationType))
			throw new NotificationTypeException('$notificationType must be instance of NotificationType');
		
		if($fields instanceof \stdClass)
		{
			$factory = self::getInstance();
			$stdClass = clone $fields;
			$fields = array();
			foreach ($stdClass as $key => $value)
				$fields[$factory->getUnderscore($key)] = $value;
		}
		
		if(isset($fields[NotificationType::ID_NOTIFICATION_TYPE])){
			$notificationType->setIdNotificationType($fields[NotificationType::ID_NOTIFICATION_TYPE]);
		}
		
		if(isset($fields[NotificationType::STATUS])){
			$notificationType->setStatus($fields[NotificationType::STATUS]);
		}
		
		if(isset($fields[NotificationType::NAME])){
			$notificationType->setName($fields[NotificationType::NAME]);
		}
		
	}
}
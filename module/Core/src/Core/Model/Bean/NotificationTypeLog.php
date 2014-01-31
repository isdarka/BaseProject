<?php

/**
 *
 * NotificationTypeLogBean
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Bean
 * @copyright 
 * @license 
 * @created Fri Jan 31 09:48:50 2014
 * @version 1.0
 */

namespace Core\Model\Bean;


class NotificationTypeLog extends Log
{

	const TABLENAME = 'core_notification_types_logs';

	const ID_NOTIFICATION_TYPE_LOG = 'id_notification_type_log';

	const ID_NOTIFICATION_TYPE = 'id_notification_type';

	const ID_LOG = 'id_log';

	private $idNotificationTypeLog;

	private $idNotificationType;

	private $idLog;

		
 	/**
 	 *
 	 * Get the idNotificationTypeLog property
 	 *
 	 * @return int $idNotificationTypeLog
 	 */
	public function getIndex() 
	{
		return $this->idNotificationTypeLog;
	}
		
 	/**
 	 *
 	 * Set the idNotificationTypeLog property
 	 *
 	 * @param int $idNotificationTypeLog
 	 */
	public function setIdNotificationTypeLog($idNotificationTypeLog) 
	{
		$this->idNotificationTypeLog = $idNotificationTypeLog;
		return $this;
	}
		
 	/**
 	 *
 	 * Set the idNotificationType property
 	 *
 	 * @param int $idNotificationType
 	 */
	public function setIdNotificationType($idNotificationType) 
	{
		$this->idNotificationType = $idNotificationType;
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
 	 * Get the idNotificationTypeLog property
 	 *
 	 * @return int $idNotificationTypeLog
 	 */
	public function getIdNotificationTypeLog() 
	{
		return $this->idNotificationTypeLog;
	}
		
 	/**
 	 *
 	 * Get the idNotificationType property
 	 *
 	 * @return int $idNotificationType
 	 */
	public function getIdNotificationType() 
	{
		return $this->idNotificationType;
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
			self::ID_NOTIFICATION_TYPE_LOG => $this->getIdNotificationTypeLog(),
			self::ID_NOTIFICATION_TYPE => $this->getIdNotificationType(),
			self::ID_LOG => $this->getIdLog(),
		);
		return array_merge(parent::toArray(), $array);
	}
}
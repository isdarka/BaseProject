<?php

/**
 *
 * NotificationTypeBean
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

use Model\Bean\AbstractBean;

class NotificationType extends AbstractBean
{

	const TABLENAME = 'core_notification_types';

	const ID_NOTIFICATION_TYPE = 'id_notification_type';

	const STATUS = 'status';

	const NAME = 'name';

	const ENABLE = '1';

	const DISABLE = '2';

	private $idNotificationType;

	private $status;

	private $name;

		
 	/**
 	 *
 	 * Get the idNotificationType property
 	 *
 	 * @return int $idNotificationType
 	 */
	public function getIndex() 
	{
		return $this->idNotificationType;
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
 	 * Set the status property
 	 *
 	 * @param int $status
 	 */
	public function setStatus($status) 
	{
		$this->status = $status;
		return $this;
	}
		
 	/**
 	 *
 	 * Set the name property
 	 *
 	 * @param string $name
 	 */
	public function setName($name) 
	{
		$this->name = $name;
		return $this;
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
 	 * Get the status property
 	 *
 	 * @return int $status
 	 */
	public function getStatus() 
	{
		return $this->status;
	}
		
 	/**
 	 *
 	 * Get the name property
 	 *
 	 * @return string $name
 	 */
	public function getName() 
	{
		return $this->name;
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
			self::ID_NOTIFICATION_TYPE => $this->getIdNotificationType(),
			self::STATUS => $this->getStatus(),
			self::NAME => $this->getName(),
		);
		return $array;
	}
		
 	/**
 	 *
 	 * Statuses
 	 *
 	 */
	public static $statuses = array( 
		self::ENABLE => "Enable", 
		self::DISABLE => "Disable", 
	
	);
		
 	/**
 	 *
 	 * idNotificationType is enable
 	 *
 	 * @return boolean
 	 */
	public function isEnabled() 
	{
		return self::ENABLE == $this->getStatus();
	}
		
 	/**
 	 *
 	 * idNotificationType is disable
 	 *
 	 * @return boolean
 	 */
	public function isDisabled() 
	{
		return self::DISABLE == $this->getStatus();
	}
		
 	/**
 	 *
 	 * Get Status Name
 	 *
 	 * @return string
 	 */
	public function getStatusString() 
	{
		return self::$statuses[$this->getStatus()];
	}
}
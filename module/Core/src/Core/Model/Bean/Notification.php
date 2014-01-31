<?php

/**
 *
 * NotificationBean
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

class Notification extends AbstractBean
{

	const TABLENAME = 'core_notifications';

	const ID_NOTIFICATION = 'id_notification';

	const ID_NOTIFICATION_TYPE = 'id_notification_type';

	const STATUS = 'status';

	const CREATED = 'created';

	const DISPATCHED = 'dispatched';

	const VARIABLES = 'variables';

	const ENABLE = '1';

	const DISABLE = '2';

	private $idNotification;

	private $idNotificationType;

	private $status = '1';

	private $created = 'CURRENT_TIMESTAMP';

	private $dispatched;

	private $variables;

		
 	/**
 	 *
 	 * Get the idNotification property
 	 *
 	 * @return int $idNotification
 	 */
	public function getIndex() 
	{
		return $this->idNotification;
	}
		
 	/**
 	 *
 	 * Set the idNotification property
 	 *
 	 * @param int $idNotification
 	 */
	public function setIdNotification($idNotification) 
	{
		$this->idNotification = $idNotification;
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
 	 * Set the created property
 	 *
 	 * @param $created
 	 */
	public function setCreated($created) 
	{
		$this->created = $created;
		return $this;
	}
		
 	/**
 	 *
 	 * Set the dispatched property
 	 *
 	 * @param $dispatched
 	 */
	public function setDispatched($dispatched) 
	{
		$this->dispatched = $dispatched;
		return $this;
	}
		
 	/**
 	 *
 	 * Set the variables property
 	 *
 	 * @param string $variables
 	 */
	public function setVariables($variables) 
	{
		$this->variables = $variables;
		return $this;
	}
		
 	/**
 	 *
 	 * Get the idNotification property
 	 *
 	 * @return int $idNotification
 	 */
	public function getIdNotification() 
	{
		return $this->idNotification;
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
 	 * Get the created property
 	 *
 	 * @return Zend_Date $created
 	 */
	public function getCreated() 
	{
		return $this->created;
	}
		
 	/**
 	 *
 	 * Get the dispatched property
 	 *
 	 * @return Zend_Date $dispatched
 	 */
	public function getDispatched() 
	{
		return $this->dispatched;
	}
		
 	/**
 	 *
 	 * Get the variables property
 	 *
 	 * @return string $variables
 	 */
	public function getVariables() 
	{
		return $this->variables;
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
			self::ID_NOTIFICATION => $this->getIdNotification(),
			self::ID_NOTIFICATION_TYPE => $this->getIdNotificationType(),
			self::STATUS => $this->getStatus(),
			self::CREATED => $this->getCreated(),
			self::DISPATCHED => $this->getDispatched(),
			self::VARIABLES => $this->getVariables(),
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
 	 * idNotification is enable
 	 *
 	 * @return boolean
 	 */
	public function isEnabled() 
	{
		return self::ENABLE == $this->getStatus();
	}
		
 	/**
 	 *
 	 * idNotification is disable
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
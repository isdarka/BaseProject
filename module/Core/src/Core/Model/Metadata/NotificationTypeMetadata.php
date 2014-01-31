<?php

/**
 *
 * NotificationTypeBean
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Metadata
 * @copyright 
 * @license 
 * @created Fri Jan 31 09:48:50 2014
 * @version 1.0
 */

namespace Core\Model\Metadata;

use Model\Bean\AbstractBean;
use Model\Metadata\AbstractMetadata;
use Core\Model\Bean\NotificationType;
use Core\Model\Factory\NotificationTypeFactory;
use Core\Model\Collection\NotificationTypeCollection;

class NotificationTypeMetadata extends AbstractMetadata
{

		
 	/**
 	 *
 	 * toUpdateArray
 	 *
 	 */
	public static  function toUpdateArray(AbstractBean $bean) 
	{
		return $bean->toArrayFor(
			array(
				NotificationType::STATUS,
				NotificationType::NAME,
			)
		);
	}
		
 	/**
 	 *
 	 * toCreateArray
 	 *
 	 */
	public static  function toCreateArray(AbstractBean $bean) 
	{
		return $bean->toArrayFor(
			array(
				NotificationType::ID_NOTIFICATION_TYPE,
				NotificationType::STATUS,
				NotificationType::NAME,
			)
		);
	}
		
 	/**
 	 *
 	 * Get fields
 	 *
 	 */
	public static  function getFields() 
	{
		return array(
			NotificationType::ID_NOTIFICATION_TYPE,
			NotificationType::STATUS,
			NotificationType::NAME,
		);
	}
		
 	/**
 	 *
 	 * Get Entity Name
 	 *
 	 * @return string
 	 */
	public static  function getEntityName() 
	{
		return "NotificationType";
	}
		
 	/**
 	 *
 	 * Get TableName
 	 *
 	 * @return string
 	 */
	public static  function getTableName() 
	{
		return "core_notification_types";
	}
		
 	/**
 	 *
 	 * Get PrimaryKey
 	 *
 	 * @return string
 	 */
	public static  function getPrimaryKey() 
	{
		return "id_notification_type";
	}
		
 	/**
 	 *
 	 * Get Factory
 	 *
 	 * @return NotificationTypeFactory
 	 */
	public static  function getFactory() 
	{
		static $factory = null;
		if( null == $factory ){
			$factory = new NotificationTypeFactory();
		}
		return $factory;
	}
		
 	/**
 	 *
 	 * Get Collection
 	 *
 	 * @return NotificationTypeCollection
 	 */
	public static  function newCollection() 
	{
		return new NotificationTypeCollection();
	}
		
 	/**
 	 *
 	 * Get Bean
 	 *
 	 * @return NotificationType
 	 */
	public static  function newBean() 
	{
		return new NotificationType();
	}
}
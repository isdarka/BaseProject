<?php

/**
 *
 * NotificationBean
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
use Core\Model\Bean\Notification;
use Core\Model\Factory\NotificationFactory;
use Core\Model\Collection\NotificationCollection;

class NotificationMetadata extends AbstractMetadata
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
				Notification::ID_NOTIFICATION_TYPE,
				Notification::STATUS,
				Notification::CREATED,
				Notification::DISPATCHED,
				Notification::VARIABLES,
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
				Notification::ID_NOTIFICATION,
				Notification::ID_NOTIFICATION_TYPE,
				Notification::STATUS,
				Notification::CREATED,
				Notification::DISPATCHED,
				Notification::VARIABLES,
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
			Notification::ID_NOTIFICATION,
			Notification::ID_NOTIFICATION_TYPE,
			Notification::STATUS,
			Notification::CREATED,
			Notification::DISPATCHED,
			Notification::VARIABLES,
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
		return "Notification";
	}
		
 	/**
 	 *
 	 * Get TableName
 	 *
 	 * @return string
 	 */
	public static  function getTableName() 
	{
		return "core_notifications";
	}
		
 	/**
 	 *
 	 * Get PrimaryKey
 	 *
 	 * @return string
 	 */
	public static  function getPrimaryKey() 
	{
		return "id_notification";
	}
		
 	/**
 	 *
 	 * Get Factory
 	 *
 	 * @return NotificationFactory
 	 */
	public static  function getFactory() 
	{
		static $factory = null;
		if( null == $factory ){
			$factory = new NotificationFactory();
		}
		return $factory;
	}
		
 	/**
 	 *
 	 * Get Collection
 	 *
 	 * @return NotificationCollection
 	 */
	public static  function newCollection() 
	{
		return new NotificationCollection();
	}
		
 	/**
 	 *
 	 * Get Bean
 	 *
 	 * @return Notification
 	 */
	public static  function newBean() 
	{
		return new Notification();
	}
}
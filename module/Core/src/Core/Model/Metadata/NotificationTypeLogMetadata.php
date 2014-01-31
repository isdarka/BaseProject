<?php

/**
 *
 * NotificationTypeLogBean
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
use Core\Model\Bean\NotificationTypeLog;
use Core\Model\Factory\NotificationTypeLogFactory;
use Core\Model\Collection\NotificationTypeLogCollection;

class NotificationTypeLogMetadata extends AbstractMetadata
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
				NotificationTypeLog::ID_NOTIFICATION_TYPE,
				NotificationTypeLog::ID_LOG,
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
				NotificationTypeLog::ID_NOTIFICATION_TYPE_LOG,
				NotificationTypeLog::ID_NOTIFICATION_TYPE,
				NotificationTypeLog::ID_LOG,
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
			NotificationTypeLog::ID_NOTIFICATION_TYPE_LOG,
			NotificationTypeLog::ID_NOTIFICATION_TYPE,
			NotificationTypeLog::ID_LOG,
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
		return "NotificationTypeLog";
	}
		
 	/**
 	 *
 	 * Get TableName
 	 *
 	 * @return string
 	 */
	public static  function getTableName() 
	{
		return "core_notification_types_logs";
	}
		
 	/**
 	 *
 	 * Get PrimaryKey
 	 *
 	 * @return string
 	 */
	public static  function getPrimaryKey() 
	{
		return "id_notification_type_log";
	}
		
 	/**
 	 *
 	 * Get Factory
 	 *
 	 * @return NotificationTypeLogFactory
 	 */
	public static  function getFactory() 
	{
		static $factory = null;
		if( null == $factory ){
			$factory = new NotificationTypeLogFactory();
		}
		return $factory;
	}
		
 	/**
 	 *
 	 * Get Collection
 	 *
 	 * @return NotificationTypeLogCollection
 	 */
	public static  function newCollection() 
	{
		return new NotificationTypeLogCollection();
	}
		
 	/**
 	 *
 	 * Get Bean
 	 *
 	 * @return NotificationTypeLog
 	 */
	public static  function newBean() 
	{
		return new NotificationTypeLog();
	}
}
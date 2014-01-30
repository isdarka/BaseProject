<?php

/**
 *
 * MessageLogBean
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Metadata
 * @copyright 
 * @license 
 * @created Wed Jan 29 11:43:50 2014
 * @version 1.0
 */

namespace Core\Model\Metadata;

use Model\Bean\AbstractBean;
use Model\Metadata\AbstractMetadata;
use Core\Model\Bean\MessageLog;
use Core\Model\Factory\MessageLogFactory;
use Core\Model\Collection\MessageLogCollection;

class MessageLogMetadata extends AbstractMetadata
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
				MessageLog::ID_MESSAGE,
				MessageLog::ID_LOG,
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
				MessageLog::ID_MESSAGE_LOG,
				MessageLog::ID_MESSAGE,
				MessageLog::ID_LOG,
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
			MessageLog::ID_MESSAGE_LOG,
			MessageLog::ID_MESSAGE,
			MessageLog::ID_LOG,
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
		return "MessageLog";
	}
		
 	/**
 	 *
 	 * Get TableName
 	 *
 	 * @return string
 	 */
	public static  function getTableName() 
	{
		return "common_messages_logs";
	}
		
 	/**
 	 *
 	 * Get PrimaryKey
 	 *
 	 * @return string
 	 */
	public static  function getPrimaryKey() 
	{
		return "id_message_log";
	}
		
 	/**
 	 *
 	 * Get Factory
 	 *
 	 * @return MessageLogFactory
 	 */
	public static  function getFactory() 
	{
		static $factory = null;
		if( null == $factory ){
			$factory = new MessageLogFactory();
		}
		return $factory;
	}
		
 	/**
 	 *
 	 * Get Collection
 	 *
 	 * @return MessageLogCollection
 	 */
	public static  function newCollection() 
	{
		return new MessageLogCollection();
	}
		
 	/**
 	 *
 	 * Get Bean
 	 *
 	 * @return MessageLog
 	 */
	public static  function newBean() 
	{
		return new MessageLog();
	}
}
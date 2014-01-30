<?php

/**
 *
 * MessageBean
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Metadata
 * @copyright 
 * @license 
 * @created Wed Jan 29 11:40:44 2014
 * @version 1.0
 */

namespace Core\Model\Metadata;

use Model\Bean\AbstractBean;
use Model\Metadata\AbstractMetadata;
use Core\Model\Bean\Message;
use Core\Model\Factory\MessageFactory;
use Core\Model\Collection\MessageCollection;

class MessageMetadata extends AbstractMetadata
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
				Message::ID_USER,
				Message::STATUS,
				Message::TIMESTAMP,
				Message::SUBJECT,
				Message::MESSAGE,
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
				Message::ID_MESSAGE,
				Message::ID_USER,
				Message::STATUS,
				Message::TIMESTAMP,
				Message::SUBJECT,
				Message::MESSAGE,
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
			Message::ID_MESSAGE,
			Message::ID_USER,
			Message::STATUS,
			Message::TIMESTAMP,
			Message::SUBJECT,
			Message::MESSAGE,
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
		return "Message";
	}
		
 	/**
 	 *
 	 * Get TableName
 	 *
 	 * @return string
 	 */
	public static  function getTableName() 
	{
		return "common_messages";
	}
		
 	/**
 	 *
 	 * Get PrimaryKey
 	 *
 	 * @return string
 	 */
	public static  function getPrimaryKey() 
	{
		return "id_message";
	}
		
 	/**
 	 *
 	 * Get Factory
 	 *
 	 * @return MessageFactory
 	 */
	public static  function getFactory() 
	{
		static $factory = null;
		if( null == $factory ){
			$factory = new MessageFactory();
		}
		return $factory;
	}
		
 	/**
 	 *
 	 * Get Collection
 	 *
 	 * @return MessageCollection
 	 */
	public static  function newCollection() 
	{
		return new MessageCollection();
	}
		
 	/**
 	 *
 	 * Get Bean
 	 *
 	 * @return Message
 	 */
	public static  function newBean() 
	{
		return new Message();
	}
}
<?php

/**
 *
 * UserMessageBean
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Metadata
 * @copyright 
 * @license 
 * @created Wed Jan 29 14:40:50 2014
 * @version 1.0
 */

namespace Core\Model\Metadata;

use Model\Bean\AbstractBean;
use Model\Metadata\AbstractMetadata;
use Core\Model\Bean\UserMessage;
use Core\Model\Factory\UserMessageFactory;
use Core\Model\Collection\UserMessageCollection;

class UserMessageMetadata extends AbstractMetadata
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
				UserMessage::STATUS,
				UserMessage::ID_USER,
				UserMessage::ID_MESSAGE,
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
				UserMessage::ID_USER_MESSAGE,
				UserMessage::STATUS,
				UserMessage::ID_USER,
				UserMessage::ID_MESSAGE,
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
			UserMessage::ID_USER_MESSAGE,
			UserMessage::STATUS,
			UserMessage::ID_USER,
			UserMessage::ID_MESSAGE,
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
		return "UserMessage";
	}
		
 	/**
 	 *
 	 * Get TableName
 	 *
 	 * @return string
 	 */
	public static  function getTableName() 
	{
		return "common_users_messages";
	}
		
 	/**
 	 *
 	 * Get PrimaryKey
 	 *
 	 * @return string
 	 */
	public static  function getPrimaryKey() 
	{
		return "id_user_message";
	}
		
 	/**
 	 *
 	 * Get Factory
 	 *
 	 * @return UserMessageFactory
 	 */
	public static  function getFactory() 
	{
		static $factory = null;
		if( null == $factory ){
			$factory = new UserMessageFactory();
		}
		return $factory;
	}
		
 	/**
 	 *
 	 * Get Collection
 	 *
 	 * @return UserMessageCollection
 	 */
	public static  function newCollection() 
	{
		return new UserMessageCollection();
	}
		
 	/**
 	 *
 	 * Get Bean
 	 *
 	 * @return UserMessage
 	 */
	public static  function newBean() 
	{
		return new UserMessage();
	}
}
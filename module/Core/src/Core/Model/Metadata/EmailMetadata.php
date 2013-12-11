<?php

/**
 *
 * EmailBean
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Metadata
 * @copyright 
 * @license 
 * @created Wed Dec 11 09:36:19 2013
 * @version 1.0
 */

namespace Core\Model\Metadata;

use Model\Bean\AbstractBean;
use Model\Metadata\AbstractMetadata;
use Core\Model\Bean\Email;
use Core\Model\Factory\EmailFactory;
use Core\Model\Collection\EmailCollection;

class EmailMetadata extends AbstractMetadata
{

		
 	/**
 	 *
 	 * toUpdateArray
 	 *
 	 */
	public function toUpdateArray(AbstractBean $bean) 
	{
		return $bean->toArrayFor(
			array(
				Email::EMAIL,
			)
		);
	}
		
 	/**
 	 *
 	 * toCreateArray
 	 *
 	 */
	public function toCreateArray(AbstractBean $bean) 
	{
		return $bean->toArrayFor(
			array(
				Email::ID_EMAIL,
				Email::EMAIL,
			)
		);
	}
		
 	/**
 	 *
 	 * Get fields
 	 *
 	 */
	public function getFields() 
	{
		return array(
			Email::ID_EMAIL,
			Email::EMAIL,
		);
	}
		
 	/**
 	 *
 	 * Get Entity Name
 	 *
 	 * @return string
 	 */
	public function getEntityName() 
	{
		return "Email";
	}
		
 	/**
 	 *
 	 * Get TableName
 	 *
 	 * @return string
 	 */
	public function getTableName() 
	{
		return "common_emails";
	}
		
 	/**
 	 *
 	 * Get PrimaryKey
 	 *
 	 * @return string
 	 */
	public function getPrimaryKey() 
	{
		return "id_email";
	}
		
 	/**
 	 *
 	 * Get Factory
 	 *
 	 * @return EmailFactory
 	 */
	public function getFactory() 
	{
		static $factory = null;
		if( null == $factory ){
			$factory = new EmailFactory();
		}
		return $factory;
	}
		
 	/**
 	 *
 	 * Get Collection
 	 *
 	 * @return EmailCollection
 	 */
	public function newCollection() 
	{
		return new EmailCollection();
	}
		
 	/**
 	 *
 	 * Get Bean
 	 *
 	 * @return Email
 	 */
	public function newBean() 
	{
		return new Email();
	}
}
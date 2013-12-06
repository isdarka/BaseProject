<?php
/**
 *
 * @author isdarka
 * @created Nov 24, 2013 6:32:20 PM
 */

namespace Model\Interfaces;

use Model\Bean\AbstractBean;
interface MetadataInterface
{
	public static function newBean(array $fields);
	
	public static function newCollection();
	

	
	/**
	 * @return string
	 */
	public static function getTablename();
	
	/**
	 * @return string
	 */
	public static function getEntityName();
	
	/**
	 * @return array
	 */
	public static function getFields();
	/**
	 * @return string
	 */
	public static function getPrimaryKey();
	
	/**
	 * @return boolean
	 */
	public static function isBean($bean);
	
	/**
	 * @return array
	 */
	public static function toUpdateArray(AbstractBean $bean);
	
	/**
	 * @return array
	 */
	public static function toCreateArray(AbstractBean $bean);
	
	
	public static function getCatalog();
	
	public static function getFactory();
}
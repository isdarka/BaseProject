<?php

/**
 *
 * FileBean
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Factory
 * @copyright 
 * @license 
 * @created Mon Dec 23 12:44:25 2013
 * @version 1.0
 */

namespace Core\Model\Factory;

use Core\Model\Bean\File;
use Model\Factory\AbstractFactory;
use Core\Model\Exception\FileException;

class FileFactory extends AbstractFactory
{

		
 	/**
 	 *
 	 * Create File from array
 	 *
 	 * @return File
 	 */
	public static  function createFromArray($fields) 
	{
		$file = new File();
		self::populate($file,$fields);
		return $file;
	}
		
 	/**
 	 *
 	 * Populate File
 	 *
 	 */
	public static  function populate($file, $fields) 
	{
		if(!($file instanceof File))
			throw new FileException('$file must be instance of File');
		
		if($fields instanceof \stdClass)
		{
			$factory = self::getInstance();
			$stdClass = clone $fields;
			$fields = array();
			foreach ($stdClass as $key => $value)
				$fields[$factory->getUnderscore($key)] = $value;
		}
		
		if(isset($fields[File::ID_FILE])){
			$file->setIdFile($fields[File::ID_FILE]);
		}
		
		if(isset($fields[File::STATUS])){
			$file->setStatus($fields[File::STATUS]);
		}
		
		if(isset($fields[File::NAME])){
			$file->setName($fields[File::NAME]);
		}
		
		if(isset($fields[File::TIMESTAMP])){
			$file->setTimestamp($fields[File::TIMESTAMP]);
		}
		
		if(isset($fields[File::PATH])){
			$file->setPath($fields[File::PATH]);
		}
		
	}
}
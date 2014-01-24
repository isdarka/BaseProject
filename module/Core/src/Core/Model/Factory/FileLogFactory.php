<?php

/**
 *
 * FileLogBean
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

use Core\Model\Bean\FileLog;
use Core\Model\Exception\FileLogException;

class FileLogFactory extends LogFactory
{

		
 	/**
 	 *
 	 * Create FileLog from array
 	 *
 	 * @return FileLog
 	 */
	public static  function createFromArray($fields) 
	{
		$fileLog = new FileLog();
		self::populate($fileLog,$fields);
		return $fileLog;
	}
		
 	/**
 	 *
 	 * Populate FileLog
 	 *
 	 */
	public static  function populate($fileLog, $fields) 
	{
		parent::populate($fileLog, $fields);
		if(!($fileLog instanceof FileLog))
			throw new FileLogException('$fileLog must be instance of FileLog');
		
		if($fields instanceof \stdClass)
		{
			$factory = self::getInstance();
			$stdClass = clone $fields;
			$fields = array();
			foreach ($stdClass as $key => $value)
				$fields[$factory->getUnderscore($key)] = $value;
		}
		
		if(isset($fields[FileLog::ID_FILE_LOG])){
			$fileLog->setIdFileLog($fields[FileLog::ID_FILE_LOG]);
		}
		
		if(isset($fields[FileLog::ID_FILE])){
			$fileLog->setIdFile($fields[FileLog::ID_FILE]);
		}
		
		if(isset($fields[FileLog::ID_LOG])){
			$fileLog->setIdLog($fields[FileLog::ID_LOG]);
		}
		
	}
}
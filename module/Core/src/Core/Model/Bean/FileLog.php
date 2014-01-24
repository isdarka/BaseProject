<?php

/**
 *
 * FileLogBean
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Bean
 * @copyright 
 * @license 
 * @created Mon Dec 23 12:44:25 2013
 * @version 1.0
 */

namespace Core\Model\Bean;


class FileLog extends Log
{

	const TABLENAME = 'core_files_logs';

	const ID_FILE_LOG = 'id_file_log';

	const ID_FILE = 'id_file';

	const ID_LOG = 'id_log';

	private $idFileLog;

	private $idFile;

	private $idLog;

		
 	/**
 	 *
 	 * Get the idFileLog property
 	 *
 	 * @return int $idFileLog
 	 */
	public function getIndex() 
	{
		return $this->idFileLog;
	}
		
 	/**
 	 *
 	 * Set the idFileLog property
 	 *
 	 * @param int $idFileLog
 	 */
	public function setIdFileLog($idFileLog) 
	{
		$this->idFileLog = $idFileLog;
		return $this;
	}
		
 	/**
 	 *
 	 * Set the idFile property
 	 *
 	 * @param int $idFile
 	 */
	public function setIdFile($idFile) 
	{
		$this->idFile = $idFile;
		return $this;
	}
		
 	/**
 	 *
 	 * Set the idLog property
 	 *
 	 * @param int $idLog
 	 */
	public function setIdLog($idLog) 
	{
		$this->idLog = $idLog;
		return $this;
	}
		
 	/**
 	 *
 	 * Get the idFileLog property
 	 *
 	 * @return int $idFileLog
 	 */
	public function getIdFileLog() 
	{
		return $this->idFileLog;
	}
		
 	/**
 	 *
 	 * Get the idFile property
 	 *
 	 * @return int $idFile
 	 */
	public function getIdFile() 
	{
		return $this->idFile;
	}
		
 	/**
 	 *
 	 * Get the idLog property
 	 *
 	 * @return int $idLog
 	 */
	public function getIdLog() 
	{
		return $this->idLog;
	}
		
 	/**
 	 *
 	 * Get the Array
 	 *
 	 * @return array
 	 */
	public function toArray() 
	{
		$array = array(
			self::ID_FILE_LOG => $this->getIdFileLog(),
			self::ID_FILE => $this->getIdFile(),
			self::ID_LOG => $this->getIdLog(),
		);
		return array_merge(parent::toArray(), $array);
	}
	
	public function getEventString()
	{
		return self::$events[$this->getEvent()];
	}
	
	const DOWNLOADED = 5;
	public static $events = array(
			self::ENABLED => 'Enabled',
			self::DISABLED => 'Disabled',
			self::CREATED => 'Created',
			self::UPDATED => 'Updated',
			self::DOWNLOADED => "Descargado",
	);
}
<?php

/**
 *
 * FileBean
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

use Model\Bean\AbstractBean;

class File extends AbstractBean
{

	const TABLENAME = 'core_files';

	const ID_FILE = 'id_file';

	const STATUS = 'status';

	const NAME = 'name';

	const TIMESTAMP = 'timestamp';

	const PATH = 'path';

	const ENABLE = '1';

	const DISABLE = '2';

	private $idFile;

	private $status = '1';

	private $name;

	private $timestamp = 'CURRENT_TIMESTAMP';

	private $path;

		
 	/**
 	 *
 	 * Get the idFile property
 	 *
 	 * @return int $idFile
 	 */
	public function getIndex() 
	{
		return $this->idFile;
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
 	 * Set the status property
 	 *
 	 * @param int $status
 	 */
	public function setStatus($status) 
	{
		$this->status = $status;
		return $this;
	}
		
 	/**
 	 *
 	 * Set the name property
 	 *
 	 * @param string $name
 	 */
	public function setName($name) 
	{
		$this->name = $name;
		return $this;
	}
		
 	/**
 	 *
 	 * Set the timestamp property
 	 *
 	 * @param $timestamp
 	 */
	public function setTimestamp($timestamp) 
	{
		$this->timestamp = $timestamp;
		return $this;
	}
		
 	/**
 	 *
 	 * Set the path property
 	 *
 	 * @param string $path
 	 */
	public function setPath($path) 
	{
		$this->path = $path;
		return $this;
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
 	 * Get the status property
 	 *
 	 * @return int $status
 	 */
	public function getStatus() 
	{
		return $this->status;
	}
		
 	/**
 	 *
 	 * Get the name property
 	 *
 	 * @return string $name
 	 */
	public function getName() 
	{
		return $this->name;
	}
		
 	/**
 	 *
 	 * Get the timestamp property
 	 *
 	 * @return Zend_Date $timestamp
 	 */
	public function getTimestamp() 
	{
		return $this->timestamp;
	}
		
 	/**
 	 *
 	 * Get the path property
 	 *
 	 * @return string $path
 	 */
	public function getPath() 
	{
		return $this->path;
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
			self::ID_FILE => $this->getIdFile(),
			self::STATUS => $this->getStatus(),
			self::NAME => $this->getName(),
			self::TIMESTAMP => $this->getTimestamp(),
			self::PATH => $this->getPath(),
		);
		return $array;
	}
		
 	/**
 	 *
 	 * Statuses
 	 *
 	 */
	public static $statuses = array( 
		self::ENABLE => "Enable", 
		self::DISABLE => "Disable", 
	
	);
		
 	/**
 	 *
 	 * idFile is enable
 	 *
 	 * @return boolean
 	 */
	public function isEnabled() 
	{
		return self::ENABLE == $this->getStatus();
	}
		
 	/**
 	 *
 	 * idFile is disable
 	 *
 	 * @return boolean
 	 */
	public function isDisabled() 
	{
		return self::DISABLE == $this->getStatus();
	}
		
 	/**
 	 *
 	 * Get Status Name
 	 *
 	 * @return string
 	 */
	public function getStatusString() 
	{
		return self::$statuses[$this->getStatus()];
	}
}
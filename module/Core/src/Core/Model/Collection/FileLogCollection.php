<?php

/**
 *
 * FileLogBean
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Collection
 * @copyright 
 * @license 
 * @created Mon Dec 23 12:44:25 2013
 * @version 1.0
 */

namespace Core\Model\Collection;

use Core\Model\Bean\FileLog;

class FileLogCollection extends LogCollection
{

		
 	/**
 	 *
 	 * Get Ids
 	 *
 	 * @return array
 	 */
	public function getFileIds() 
	{
		return $this->map(function(FileLog $fileLog){
			return array($fileLog->getIdFile() => $action->getIdFile());
		});
	}
		
 	/**
 	 *
 	 * Get Ids
 	 *
 	 * @return FileLogCollection
 	 */
	public function getByIdFile($idFile) 
	{
		$fileLogCollection = new FileLogCollection();
		$this->each(function(FileLog $fileLog) use ($idFile, $fileLogCollection){
			if($fileLog->getIdFile() == $idFile)
				$fileLogCollection->append($fileLog);
		});
		return $fileLogCollection;
	}
		
 	/**
 	 *
 	 * Get Ids
 	 *
 	 * @return array
 	 */
	public function getLogIds() 
	{
		return $this->map(function(FileLog $fileLog){
			return array($fileLog->getIdLog() => $action->getIdLog());
		});
	}
		
 	/**
 	 *
 	 * Get Ids
 	 *
 	 * @return FileLogCollection
 	 */
	public function getByIdLog($idLog) 
	{
		$fileLogCollection = new FileLogCollection();
		$this->each(function(FileLog $fileLog) use ($idLog, $fileLogCollection){
			if($fileLog->getIdLog() == $idLog)
				$fileLogCollection->append($fileLog);
		});
		return $fileLogCollection;
	}
}
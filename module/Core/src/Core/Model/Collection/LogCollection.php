<?php

/**
 *
 * LogBean
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Collection
 * @copyright 
 * @license 
 * @created Mon Dec 9 11:45:42 2013
 * @version 1.0
 */

namespace Core\Model\Collection;

use Model\Collection\AbstractCollection;

class LogCollection extends AbstractCollection
{

		
 	/**
 	 *
 	 * Get Ids
 	 *
 	 * @return array
 	 */
	public function getUserIds() 
	{
		return $this->map(function(Log $log){
			return array($log->getIdUser() => $action->getIdUser());
		});
	}
		
 	/**
 	 *
 	 * Get Ids
 	 *
 	 * @return LogCollection
 	 */
	public function getByIdUser($idUser) 
	{
		$logCollection = new LogCollection();
		$this->each(function(Log $log) use ($idUser, $logCollection){
			if($log->getIdUser() == $idUser)
				$logCollection->append($log);
		});
		return $logCollection;
	}
}
<?php

/**
 *
 * UserLogBean
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


class UserLogCollection extends LogCollection
{

		
 	/**
 	 *
 	 * Get Ids
 	 *
 	 * @return array
 	 */
	public function getUserIds() 
	{
		return $this->map(function(UserLog $userLog){
			return array($userLog->getIdUser() => $action->getIdUser());
		});
	}
		
 	/**
 	 *
 	 * Get Ids
 	 *
 	 * @return UserLogCollection
 	 */
	public function getByIdUser($idUser) 
	{
		$userLogCollection = new UserLogCollection();
		$this->each(function(UserLog $userLog) use ($idUser, $userLogCollection){
			if($userLog->getIdUser() == $idUser)
				$userLogCollection->append($userLog);
		});
		return $userLogCollection;
	}
		
 	/**
 	 *
 	 * Get Ids
 	 *
 	 * @return array
 	 */
	public function getLogIds() 
	{
		return $this->map(function(UserLog $userLog){
			return array($userLog->getIdLog() => $action->getIdLog());
		});
	}
		
 	/**
 	 *
 	 * Get Ids
 	 *
 	 * @return UserLogCollection
 	 */
	public function getByIdLog($idLog) 
	{
		$userLogCollection = new UserLogCollection();
		$this->each(function(UserLog $userLog) use ($idLog, $userLogCollection){
			if($userLog->getIdLog() == $idLog)
				$userLogCollection->append($userLog);
		});
		return $userLogCollection;
	}
}
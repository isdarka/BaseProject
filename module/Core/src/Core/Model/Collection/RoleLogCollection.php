<?php

/**
 *
 * RoleLogBean
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Collection
 * @copyright 
 * @license 
 * @created Sun Dec 8 19:21:50 2013
 * @version 1.0
 */

namespace Core\Model\Collection;


class RoleLogCollection extends LogCollection
{

		
 	/**
 	 *
 	 * Get Ids
 	 *
 	 * @return array
 	 */
	public function getRoleIds() 
	{
		return $this->map(function(RoleLog $roleLog){
			return array($roleLog->getIdRole() => $action->getIdRole());
		});
	}
		
 	/**
 	 *
 	 * Get Ids
 	 *
 	 * @return RoleLogCollection
 	 */
	public function getByIdRole($idRole) 
	{
		$roleLogCollection = new RoleLogCollection();
		$this->each(function(RoleLog $roleLog) use ($idRole, $roleLogCollection){
			if($roleLog->getIdRole() == $idRole)
				$roleLogCollection->append($roleLog);
		});
		return $roleLogCollection;
	}
		
 	/**
 	 *
 	 * Get Ids
 	 *
 	 * @return array
 	 */
	public function getLogIds() 
	{
		return $this->map(function(RoleLog $roleLog){
			return array($roleLog->getIdLog() => $action->getIdLog());
		});
	}
		
 	/**
 	 *
 	 * Get Ids
 	 *
 	 * @return RoleLogCollection
 	 */
	public function getByIdLog($idLog) 
	{
		$roleLogCollection = new RoleLogCollection();
		$this->each(function(RoleLog $roleLog) use ($idLog, $roleLogCollection){
			if($roleLog->getIdLog() == $idLog)
				$roleLogCollection->append($roleLog);
		});
		return $roleLogCollection;
	}
}
<?php

/**
 *
 * UserBean
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

use Core\Model\Bean\User;


class UserCollection extends PersonCollection
{

		
 	/**
 	 *
 	 * Get Ids
 	 *
 	 * @return array
 	 */
	public function getPersonIds() 
	{
		return $this->map(function(User $user){
			return array($user->getIdPerson() => $action->getIdPerson());
		});
	}
		
 	/**
 	 *
 	 * Get Ids
 	 *
 	 * @return UserCollection
 	 */
	public function getByIdPerson($idPerson) 
	{
		$userCollection = new UserCollection();
		$this->each(function(User $user) use ($idPerson, $userCollection){
			if($user->getIdPerson() == $idPerson)
				$userCollection->append($user);
		});
		return $userCollection;
	}
		
 	/**
 	 *
 	 * Get Ids
 	 *
 	 * @return array
 	 */
	public function getRoleIds() 
	{
		return $this->map(function(User $user){
			return array($user->getIdRole() => $action->getIdRole());
		});
	}
		
 	/**
 	 *
 	 * Get Ids
 	 *
 	 * @return UserCollection
 	 */
	public function getByIdRole($idRole) 
	{
		$userCollection = new UserCollection();
		$this->each(function(User $user) use ($idRole, $userCollection){
			if($user->getIdRole() == $idRole)
				$userCollection->append($user);
		});
		return $userCollection;
	}
}
<?php

/**
 *
 * UserMessageBean
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Collection
 * @copyright 
 * @license 
 * @created Wed Jan 29 14:40:50 2014
 * @version 1.0
 */

namespace Core\Model\Collection;

use Core\Model\Bean\UserMessage;
use Model\Collection\AbstractCollection;

class UserMessageCollection extends AbstractCollection
{

		
 	/**
 	 *
 	 * Get Ids
 	 *
 	 * @return array
 	 */
	public function getUserIds() 
	{
		return $this->map(function(UserMessage $userMessage){
			return array($userMessage->getIdUser() => $userMessage->getIdUser());
		});
	}
		
 	/**
 	 *
 	 * Get Ids
 	 *
 	 * @return UserMessageCollection
 	 */
	public function getByIdUser($idUser) 
	{
		$userMessageCollection = new UserMessageCollection();
		$this->each(function(UserMessage $userMessage) use ($idUser, $userMessageCollection){
			if($userMessage->getIdUser() == $idUser)
				$userMessageCollection->append($userMessage);
		});
		return $userMessageCollection;
	}
		
 	/**
 	 *
 	 * Get Ids
 	 *
 	 * @return array
 	 */
	public function getMessageIds() 
	{
		return $this->map(function(UserMessage $userMessage){
			return array($userMessage->getIdMessage() => $userMessage->getIdMessage());
		});
	}
		
 	/**
 	 *
 	 * Get Ids
 	 *
 	 * @return UserMessageCollection
 	 */
	public function getByIdMessage($idMessage) 
	{
		$userMessageCollection = new UserMessageCollection();
		$this->each(function(UserMessage $userMessage) use ($idMessage, $userMessageCollection){
			if($userMessage->getIdMessage() == $idMessage)
				$userMessageCollection->append($userMessage);
		});
		return $userMessageCollection;
	}
	
	/**
	 * 
	 * @param unknown $idMessage
	 * @param unknown $idUser
	 * @return Ambigous <NULL, UserMessage>
	 */
	public function getByIdMessageAndIdUser($idMessage, $idUser)
	{
		$bean = null;
		$this->each(function(UserMessage $userMessage) use ($idMessage, $idUser, &$bean){
			if($userMessage->getIdMessage() == $idMessage && $userMessage->getIdUser() == $idUser)
				$bean = $userMessage;
		});
		return $bean;
	}
}
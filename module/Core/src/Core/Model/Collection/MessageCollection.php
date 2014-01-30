<?php

/**
 *
 * MessageBean
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Collection
 * @copyright 
 * @license 
 * @created Wed Jan 29 11:40:44 2014
 * @version 1.0
 */

namespace Core\Model\Collection;

use Core\Model\Bean\Message;
use Model\Collection\AbstractCollection;

class MessageCollection extends AbstractCollection
{

		
 	/**
 	 *
 	 * Get Ids
 	 *
 	 * @return array
 	 */
	public function getUserIds() 
	{
		return $this->map(function(Message $message){
			return array($message->getIdUser() => $message->getIdUser());
		});
	}
		
 	/**
 	 *
 	 * Get Ids
 	 *
 	 * @return MessageCollection
 	 */
	public function getByIdUser($idUser) 
	{
		$messageCollection = new MessageCollection();
		$this->each(function(Message $message) use ($idUser, $messageCollection){
			if($message->getIdUser() == $idUser)
				$messageCollection->append($message);
		});
		return $messageCollection;
	}
}
<?php

/**
 *
 * NotificationTypeBean
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Collection
 * @copyright 
 * @license 
 * @created Fri Jan 31 09:48:50 2014
 * @version 1.0
 */

namespace Core\Model\Collection;

use Core\Model\Bean\NotificationType;
use Model\Collection\AbstractCollection;

class NotificationTypeCollection extends AbstractCollection
{

		
 	/**
 	 *
 	 * @return array
 	 */
	public function toCombo() 
	{
		return $this->map(function(NotificationType $notificationType){
			return array( $notificationType->getidNotificationType() => $notificationType->getName() );
		});
	}
}
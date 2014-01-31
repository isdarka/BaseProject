<?php

/**
 *
 * NotificationTypeQuery
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Query
 * @copyright 
 * @license 
 * @created Fri Jan 31 09:48:50 2014
 * @version 1.0
 */

namespace Core\Query;

use Query\Query;
use Core\Model\Metadata\NotificationTypeMetadata;


/**
 * Core\Query\NotificationTypeQuery
 * @method \Core\Model\Collection\NotificationTypeCollection find()
 * @method \Core\Model\Bean\NotificationType findByPK() findByPK($primaryKey)
 * @method \Core\Model\Bean\NotificationType findByPKOrThrow() findByPKOrThrow($primaryKey, $exception)
 * @method \Core\Model\Bean\NotificationType findOne()
 * 
 */
class NotificationTypeQuery extends Query
{

		
 	/**
 	 *
 	 * Contruct NotificationTypeQuery
 	 *
 	 */
	public function __construct($adapter) 
	{
		$this->metadata = new NotificationTypeMetadata();
		parent::__construct($adapter, $this->metadata->getTableName(), $this->metadata->getEntityName());
	}
}
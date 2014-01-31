<?php

/**
 *
 * NotificationQuery
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
use Core\Model\Metadata\NotificationMetadata;


/**
 * Core\Query\NotificationQuery
 * @method \Core\Model\Collection\NotificationCollection find()
 * @method \Core\Model\Bean\Notification findByPK() findByPK($primaryKey)
 * @method \Core\Model\Bean\Notification findByPKOrThrow() findByPKOrThrow($primaryKey, $exception)
 * @method \Core\Model\Bean\Notification findOne()
 * 
 */
class NotificationQuery extends Query
{

		
 	/**
 	 *
 	 * Contruct NotificationQuery
 	 *
 	 */
	public function __construct($adapter) 
	{
		$this->metadata = new NotificationMetadata();
		parent::__construct($adapter, $this->metadata->getTableName(), $this->metadata->getEntityName());
	}
}
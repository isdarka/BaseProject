<?php

/**
 *
 * NotificationTypeLogQuery
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
use Core\Model\Metadata\NotificationTypeLogMetadata;
use Core\Model\Bean\Log;


/**
 * Core\Query\NotificationTypeLogQuery
 * @method \Core\Model\Collection\NotificationTypeLogCollection find()
 * @method \Core\Model\Bean\NotificationTypeLog findByPK() findByPK($primaryKey)
 * @method \Core\Model\Bean\NotificationTypeLog findByPKOrThrow() findByPKOrThrow($primaryKey, $exception)
 * @method \Core\Model\Bean\NotificationTypeLog findOne()
 * 
 */
class NotificationTypeLogQuery extends Query
{

		
 	/**
 	 *
 	 * Contruct NotificationTypeLogQuery
 	 *
 	 */
	public function __construct($adapter) 
	{
		$this->metadata = new NotificationTypeLogMetadata();
		parent::__construct($adapter, $this->metadata->getTableName(), $this->metadata->getEntityName());
		$this->innerJoin(new Log());
	}
}
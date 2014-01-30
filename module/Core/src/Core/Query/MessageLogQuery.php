<?php

/**
 *
 * MessageLogQuery
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Query
 * @copyright 
 * @license 
 * @created Wed Jan 29 11:43:50 2014
 * @version 1.0
 */

namespace Core\Query;

use Query\Query;
use Core\Model\Metadata\MessageLogMetadata;
use Core\Model\Bean\Log;


/**
 * Core\Query\MessageLogQuery
 * @method \Core\Model\Collection\MessageLogCollection find()
 * @method \Core\Model\Bean\MessageLog findByPK() findByPK($primaryKey)
 * @method \Core\Model\Bean\MessageLog findByPKOrThrow() findByPKOrThrow($primaryKey, $exception)
 * @method \Core\Model\Bean\MessageLog findOne()
 * 
 */
class MessageLogQuery extends Query
{

		
 	/**
 	 *
 	 * Contruct MessageLogQuery
 	 *
 	 */
	public function __construct($adapter) 
	{
		$this->metadata = new MessageLogMetadata();
		parent::__construct($adapter, $this->metadata->getTableName(), $this->metadata->getEntityName());
		$this->innerJoin(new Log());
	}
}
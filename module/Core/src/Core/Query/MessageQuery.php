<?php

/**
 *
 * MessageQuery
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Query
 * @copyright 
 * @license 
 * @created Wed Jan 29 11:40:44 2014
 * @version 1.0
 */

namespace Core\Query;

use Query\Query;
use Core\Model\Metadata\MessageMetadata;


/**
 * Core\Query\MessageQuery
 * @method \Core\Model\Collection\MessageCollection find()
 * @method \Core\Model\Bean\Message findByPK() findByPK($primaryKey)
 * @method \Core\Model\Bean\Message findByPKOrThrow() findByPKOrThrow($primaryKey, $exception)
 * @method \Core\Model\Bean\Message findOne()
 * 
 */
class MessageQuery extends Query
{

		
 	/**
 	 *
 	 * Contruct MessageQuery
 	 *
 	 */
	public function __construct($adapter) 
	{
		$this->metadata = new MessageMetadata();
		parent::__construct($adapter, $this->metadata->getTableName(), $this->metadata->getEntityName());
	}
}
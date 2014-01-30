<?php

/**
 *
 * UserMessageQuery
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Query
 * @copyright 
 * @license 
 * @created Wed Jan 29 14:40:50 2014
 * @version 1.0
 */

namespace Core\Query;

use Query\Query;
use Core\Model\Metadata\UserMessageMetadata;


/**
 * Core\Query\UserMessageQuery
 * @method \Core\Model\Collection\UserMessageCollection find()
 * @method \Core\Model\Bean\UserMessage findByPK() findByPK($primaryKey)
 * @method \Core\Model\Bean\UserMessage findByPKOrThrow() findByPKOrThrow($primaryKey, $exception)
 * @method \Core\Model\Bean\UserMessage findOne()
 * 
 */
class UserMessageQuery extends Query
{

		
 	/**
 	 *
 	 * Contruct UserMessageQuery
 	 *
 	 */
	public function __construct($adapter) 
	{
		$this->metadata = new UserMessageMetadata();
		parent::__construct($adapter, $this->metadata->getTableName(), $this->metadata->getEntityName());
	}
}
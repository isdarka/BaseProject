<?php

/**
 *
 * FileLogQuery
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Query
 * @copyright 
 * @license 
 * @created Mon Dec 23 12:44:25 2013
 * @version 1.0
 */

namespace Core\Query;

use Query\Query;
use Core\Model\Metadata\FileLogMetadata;
use Core\Model\Bean\Log;


/**
 * Core\Query\FileLogQuery
 * @method \Core\Model\Collection\FileLogCollection find()
 * @method \Core\Model\Bean\FileLog findByPK() findByPK($primaryKey)
 * @method \Core\Model\Bean\FileLog findByPKOrThrow() findByPKOrThrow($primaryKey, $exception)
 * @method \Core\Model\Bean\FileLog findOne()
 * 
 */
class FileLogQuery extends Query
{

		
 	/**
 	 *
 	 * Contruct FileLogQuery
 	 *
 	 */
	public function __construct($adapter) 
	{
		$this->metadata = new FileLogMetadata();
		parent::__construct($adapter, $this->metadata->getTableName(), $this->metadata->getEntityName());
		$this->innerJoin(new Log());
	}
}
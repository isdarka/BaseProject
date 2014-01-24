<?php

/**
 *
 * FileQuery
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
use Core\Model\Metadata\FileMetadata;


/**
 * Core\Query\FileQuery
 * @method \Core\Model\Collection\FileCollection find()
 * @method \Core\Model\Bean\File findByPK() findByPK($primaryKey)
 * @method \Core\Model\Bean\File findByPKOrThrow() findByPKOrThrow($primaryKey, $exception)
 * @method \Core\Model\Bean\File findOne()
 * 
 */
class FileQuery extends Query
{

		
 	/**
 	 *
 	 * Contruct FileQuery
 	 *
 	 */
	public function __construct($adapter) 
	{
		$this->metadata = new FileMetadata();
		parent::__construct($adapter, $this->metadata->getTableName(), $this->metadata->getEntityName());
	}
}
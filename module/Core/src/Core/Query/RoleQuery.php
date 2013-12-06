<?php
/**
 *
 * @author isdarka
 * @created Nov 24, 2013 8:02:02 PM
 */

namespace Core\Query;

use Query\Query;
use Core\Model\Metadata\RoleMetadata;

/**
 * Core\Query\ActionQuery
 *
 * @method Core\Model\Bean\Action findByPkOrThrow() findByPkOrThrow($primaryKey, $exception)
 *
 */

class RoleQuery extends Query
{
	
	public function __construct($adapter)
	{
		$this->metadata = new RoleMetadata();
		parent::__construct($adapter, $this->metadata->getTableName(), $this->metadata->getEntityName());
	}
	
}
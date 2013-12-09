<?php
/**
 *
 * @author isdarka
 * @created Nov 26, 2013 5:53:35 PM
 */
namespace Core\Query;

use Core\Model\Metadata\UserMetadata;
use Query\Query;
use Core\Model\Metadata\UserLogMetadata;
use Core\Model\Bean\Log;

/**
 * Core\Query\UserQuery
 *
 * @method Core\Model\Bean\UserLog findByPkOrThrow() findByPkOrThrow($primaryKey, $exception)
 *
 */
class UserLogQuery extends Query
{

	public function __construct($adapter)
	{
		$this->metadata = new UserLogMetadata();
		parent::__construct($adapter, $this->metadata->getTableName(), $this->metadata->getEntityName());
		$this->innerJoin(new Log());
	}

}
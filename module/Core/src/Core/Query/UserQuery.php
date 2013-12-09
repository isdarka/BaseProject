<?php
/**
 *
 * @author isdarka
 * @created Nov 26, 2013 5:53:35 PM
 */
namespace Core\Query;

use Core\Model\Metadata\UserMetadata;
use Query\Query;
use Core\Model\Bean\Person;

/**
 * Core\Query\UserQuery
 *
 * @method Core\Model\Bean\User findByPkOrThrow() findByPkOrThrow($primaryKey, $exception)
 *
 */
class UserQuery extends Query
{

	public function __construct($adapter)
	{
		$this->metadata = new UserMetadata();
		parent::__construct($adapter, $this->metadata->getTableName(), $this->metadata->getEntityName());
		$this->innerJoin(new Person());
	}

}
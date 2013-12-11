<?php

/**
 *
 * EmailQuery
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Query
 * @copyright 
 * @license 
 * @created Wed Dec 11 09:36:19 2013
 * @version 1.0
 */

namespace Core\Query;

use Query\Query;
use Core\Model\Metadata\EmailMetadata;

class EmailQuery extends Query
{

		
 	/**
 	 *
 	 * Inner Join Person
 	 *
 	 */
	public function innerJoinPerson() 
	{
		$this->join("common_persons_emails",
			"common_persons_emails.".$this->metadata->getPrimaryKey()."=".
			$this->metadata->getEntityName().".".$this->metadata->getPrimaryKey());
		return $this;
	}
		
 	/**
 	 *
 	 * Contruct EmailQuery
 	 *
 	 */
	public function __construct($adapter) 
	{
		$this->metadata = new EmailMetadata();
		parent::__construct($adapter, $this->metadata->getTableName(), $this->metadata->getEntityName());
	}
}
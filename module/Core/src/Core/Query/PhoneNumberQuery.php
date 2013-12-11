<?php

/**
 *
 * PhoneNumberQuery
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Query
 * @copyright 
 * @license 
 * @created Wed Dec 11 09:30:39 2013
 * @version 1.0
 */

namespace Core\Query;

use Query\Query;
use Core\Model\Metadata\PhoneNumberMetadata;

class PhoneNumberQuery extends Query
{

		
 	/**
 	 *
 	 * Inner Join Person
 	 *
 	 */
	public function innerJoinPerson() 
	{
		$this->join("common_persons_phone_numbers",
			"common_persons_phone_numbers.".$this->metadata->getPrimaryKey()."=".
			$this->metadata->getEntityName().".".$this->metadata->getPrimaryKey());
		return $this;
	}
		
 	/**
 	 *
 	 * Contruct PhoneNumberQuery
 	 *
 	 */
	public function __construct($adapter) 
	{
		$this->metadata = new PhoneNumberMetadata();
		parent::__construct($adapter, $this->metadata->getTableName(), $this->metadata->getEntityName());
	}
}
<?php

/**
 *
 * PersonQuery
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Query
 * @copyright 
 * @license 
 * @created Mon Dec 9 11:22:30 2013
 * @version 1.0
 */

namespace Core\Query;

use Query\Query;
use Core\Model\Metadata\PersonMetadata;

class PersonQuery extends Query
{

		
 	/**
 	 *
 	 * Inner Join Phonenumber
 	 *
 	 */
	public function innerJoinPhonenumber() 
	{
		$this->join("common_persons_phone_numbers",
			"common_persons_phone_numbers.".$this->metadata->getPrimaryKey()."=".
			$this->metadata->getEntityName().".".$this->metadata->getPrimaryKey());
		return $this;
	}
		
 	/**
 	 *
 	 * Inner Join Email
 	 *
 	 */
	public function innerJoinEmail() 
	{
		$this->join("common_persons_emails",
			"common_persons_emails.".$this->metadata->getPrimaryKey()."=".
			$this->metadata->getEntityName().".".$this->metadata->getPrimaryKey());
		return $this;
	}
		
 	/**
 	 *
 	 * Inner Join Companie
 	 *
 	 */
	public function innerJoinCompany() 
	{
		$this->join("s2credit_companies_persons",
			"s2credit_companies_persons.".$this->metadata->getPrimaryKey()."=".
			$this->metadata->getEntityName().".".$this->metadata->getPrimaryKey());
		return $this;
	}
		
 	/**
 	 *
 	 * Inner Join Customer
 	 *
 	 */
	public function innerJoinCustomer() 
	{
		$this->join("s2credit_customers_persons",
			"s2credit_customers_persons.".$this->metadata->getPrimaryKey()."=".
			$this->metadata->getEntityName().".".$this->metadata->getPrimaryKey());
		return $this;
	}
		
 	/**
 	 *
 	 * Contruct PersonQuery
 	 *
 	 */
	public function __construct($adapter) 
	{
		$this->metadata = new PersonMetadata();
		parent::__construct($adapter, $this->metadata->getTableName(), $this->metadata->getEntityName());
	}
}
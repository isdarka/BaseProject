<?php
/**
 *
 * @author isdarka
 * @created Oct 21, 2013 8:14:00 PM
 */
namespace BaseProject\Model\Metadata;

use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Sql;
use BaseProject\Query\Query;
class AbstractMetadata
{
	
	private $adapter;
	private $table;
	private $sql;
	
	public function __construct(Adapter $adapter, $table)
	{
		$this->adapter = $adapter;
		$this->table = $table;
		$this->sql = new Sql($adapter);
	}
	
	/**
	 * 
	 * @return \BaseProject\Query\Query
	 */
	public function getQuery()
	{
		return new Query($this->adapter, $this->table,$this->getEntityName());
	}
	
// 	public static 
	
	
	
}
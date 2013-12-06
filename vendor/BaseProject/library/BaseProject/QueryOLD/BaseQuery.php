<?php 

namespace BaseProject\Query;

use BaseProject\Query\Interfaces\Comparision;
use Zend\Db\Sql\Select;
// use Zend\Db\Adapter\Platform\PlatformInterface;
use Zend\Db\Sql\Where;
use Zend\Db\Sql\Predicate\Predicate;
use Zend\Db\Sql\Expression;
use BaseProject\Query\Functions\StringFunctions;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Sql;
use Zend\Db\ResultSet\ResultSet;

class BaseQuery extends Select implements Comparision
{
	private $platformInterface;
	private $entityName;
	private $predicate = null;
	private $adapter;
	protected $where;
	
	public function __construct(Adapter $adapter, $table, $entityName = null)
	{
// 		die();
		$this->adapter = $adapter;
		$this->platformInterface = $adapter->getPlatform();
		$this->entityName = $entityName;
		$this->where = new Where();
		parent::__construct(array($entityName => $table));
	}
	/**
	 *
	 * @return string
	 */
	public function toSql()
	{
		return $this->getSqlString($this->platformInterface);
	}
	
	/**
	 *
	 * @param string $field
	 * @param string $value
	 * @param string $comparision
	 * @return \BaseProject\Query\Query
	 */
	public function whereAdd($field, $value, $comparision = self::EQUAL)
	{
		$this->predicate($field, $value,$comparision, Predicate::COMBINED_BY_AND);
		return $this;
	}
	
	/**
	 *
	 * @param string $field
	 * @param string $value
	 * @param string $comparision
	 * @return \BaseProject\Query\Query
	 */
	public function whereOrAdd($field, $value, $comparision = self::EQUAL)
	{
		$this->predicate($field, $value,$comparision, Predicate::COMBINED_BY_OR);
		return $this;
	}
	
	/**
	 *
	 * @param string $field
	 * @param string $value
	 * @param string $comparision
	 * @param string $combination
	 * @throws QueryException
	 */
	private function predicate($field, $value, $comparision, $combination)
	{
		if($combination == Predicate::COMBINED_BY_AND)
			$this->predicate = new Predicate(null, Predicate::COMBINED_BY_AND);
		else
			$this->predicate->__get("or");
	
		switch ($comparision)
		{
			case self::IN:
				if(!is_array($value))
					throw new QueryException('$value must be array but is '.gettype($value));
				$this->predicate->in($this->entityName . "." . $field, $value);
				break;
			case self::EQUAL:
				$this->predicate->equalTo($this->entityName . "." . $field, $value);
				break;
			case self::BETWEEN:
				if(!is_array($value))
					throw new QueryException('$value must be array but is '.gettype($value));
				// 				if(count($value) != 2)
					// 					throw new QueryException('$value must be array but is '.gettype($value));
				$this->predicate->between($field, $value[0], $value[1]);
				break;
			default:
				// 				$this->predicate->equalTo($field, $value, $comparision);
				break;
		}
		if($combination == Predicate::COMBINED_BY_AND)
			$this->where->addPredicate($this->predicate);
	
	}
	
	public function addColumn($field, $alias = null, $mutator = null)
	{
		if(!empty($this->columns))
			$this->columns = array();
		
		if($field instanceof BaseQuery)
		{
			$this->columns[$alias] = new Expression(sprintf(("(%s)"), $field->toSql()));
		}else{
			if(is_null($mutator) && !is_null($alias))
				$this->columns[$alias] = $field;
			elseif (is_null($alias))
				$this->columns[$field] = $field;
			else
				$this->columns[$alias] = new Expression(sprintf($mutator, $field));
		}
		return $this;
	}
	
	public function addGroupBy($field)
	{
		$this->group($field);
	}
	
	public function addDescendingOrderBy($field)
	{
		$this->order[$field] = self::DESC;
	}
	
	public function addAscendingOrderBy($field)
	{
		$this->order[$field] = self::ASC;
	}
	
	
	public function fecthAll()
	{
		return $this->resultSet()->toArray();
	}
	
	
	public function resultSet()
	{
		$resulSet = new ResultSet();
		return $resulSet->initialize($this->getStatement());
	}
	
	public function getStatement()
	{
		$sql = new Sql($this->adapter);
		return $sql->prepareStatementForSqlObject($this)->execute();
// 		return $this->pre
// 		$statement = $sql->prepareStatementForSqlObject($select);
	}
	
	
}
<?php
/**
 *
 * @author isdarka
 * @created Nov 24, 2013 6:21:13 PM
 */

namespace Model\Catalog;

use Model\Interfaces\CatalogInterface;
use Zend\Db\Adapter\Adapter;
use Model\Bean\AbstractBean;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Where;
use Zend\Db\Sql\PreparableSqlInterface;

abstract class AbstractCatalog implements CatalogInterface
{
	protected $adapter;
	protected $sql;
	protected $update;
	protected $insert;
	protected $delete;
	public function __construct(Adapter $adapter)
	{
		$this->adapter = $adapter;
		$this->sql = new Sql($this->adapter);
		
	}
	
	public function save(AbstractBean $bean)
	{
		if($bean->getIndex())
			$this->update($bean);
		else
			$this->create($bean);
	}
		
// 	protected function create(AbstractBean $bean)
// 	{
// 		$this->insert = $this->sql->insert($this->getMetadata()->getTableName());
// 		$this->insert->values($bean->toArray());
// 		$this->execute($this->insert);
		
// 		$this->getMetadata()->getFactory()->populate($bean, array(
// 				$this->getMetadata()->getPrimaryKey() => $this->getLastInsertId(),
// 		));
// 	}
	
	protected function create(AbstractBean $bean)
	{
		try {
			$this->insert = $this->sql->insert($this->getMetadata()->getTableName());
			$data = $this->getMetadata()->toCreateArray($bean);
			$data = array_filter($data, array($this, 'isNotNull'));
			$this->insert->values($data);
			$this->execute($this->insert);
			
			$this->getMetadata()->getFactory()->populate($bean, array(
					$this->getMetadata()->getPrimaryKey() => $this->getLastInsertId(),
			));
		}catch (\Zend\Db\Exception\ExceptionInterface $e) { 	
			var_dump($e->getMessage());
			die();		
			throw $e;
		} catch (\Exception $e) {
			var_dump($e->getMessage());
			die();
			throw $e;
		}
	}
	
	protected function update(AbstractBean $bean)
	{
		try {
			$this->update = $this->sql->update($this->getMetadata()->getTableName());
			$data = $this->getMetadata()->toUpdateArray($bean);
			$data = array_filter($data, array($this, 'isNotNull'));
			$this->update->set($data);
			$where = new Where();
			$where->equalTo($this->getMetadata()->getPrimaryKey(), $bean->getIndex());
			$this->update->where($where);
			$this->execute($this->update);
		}catch (\Zend\Db\Exception\ExceptionInterface $e) {
			throw $e;
		} catch (\Exception $e) {
			throw $e;
		}
	}
	
	public function beginTransaction()
	{
		$this->adapter->getDriver()->getConnection()->beginTransaction();
	}
	
	public function commit()
	{
		$this->adapter->getDriver()->getConnection()->commit();
	}
	
	public function rollback()
	{
		$this->adapter->getDriver()->getConnection()->rollback();
	}
	
	/**
	 * 
	 * @param PreparableSqlInterface $statement
	 */
	protected function execute(PreparableSqlInterface $statement)
	{
		$this->sql->prepareStatementForSqlObject($statement)->execute();
	}
	
	/**
	 * 
	 */
	protected function getLastInsertId()
	{
		return $this->adapter->getDriver()->getLastGeneratedValue();	
	}
	
	public function isNotNull($field){
		return !is_null($field);
	}
	
	/**
	 * 
	 * @return string
	 */
	public function toSql()
	{
		if($this->insert)
			return $this->insert->getSqlString($this->adapter->getPlatform());
		
		if($this->update)
			return $this->update->getSqlString($this->adapter->getPlatform());
// 		var_dump($this->insert);
// 		var_dump($this->update);
// 		die();
// 		return $this->sql->getgetSqlString($this->adapter->getPlatform());
	}
}
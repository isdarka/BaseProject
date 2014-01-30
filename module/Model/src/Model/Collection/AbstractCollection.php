<?php
/**
 *
 * @author isdarka
 * @created Nov 23, 2013 10:35:37 AM
 */

namespace Model\Collection;

use Model\Interfaces\CollectionInterface;
use Model\Interfaces\BeanInterface;
use Model\Bean\AbstractBean;
abstract class AbstractCollection extends \ArrayIterator implements CollectionInterface
{

	/**
	 *
	 *
	 * @return Collection
	 */
	public function newInstance(){
		return new static();
	}

	/**
	 *
	 * validate collectable
	 * @param Collectable $collectable
	 */
	protected function validate($bean)
	{
		if( !($bean instanceof BeanInterface) ){
			throw new \InvalidArgumentException('$bean must be instance of BeanInterface');
		}
	}

	/**
	 *
	 * validate Callback
	 * @param callable $callable
	 * @throws \InvalidArgumentException
	 */
	protected function validateCallback($callable)
	{
		if( !is_callable($callable) ){
			throw new \InvalidArgumentException("Is not a callable function");
		}
	}

	/**
	 * Appends the value
	 * @param AbstractBean $bean
	 */
	public function append($bean)
	{
		$this->validate($bean);
		parent::offsetSet($bean->getIndex(), $bean);
		$this->rewind();
	}

	/**
	 * Return current array entry
	 * @return Collectable
	 */
	public function current()
	{
		return parent::current();
	}

	/**
	 * Return current array entry and
	 * move to next entry
	 * @return AbstractBean
	 */
	public function read()
	{
		$bean = $this->current();
		$this->next();
		return $bean;
	}

	/**
	 * Get the first array entry
	 * if exists or null if not
	 * @return AbstractBean|null
	 */
	public function getOne()
	{
		if ($this->count() > 0)
		{
			$this->seek(0);
			return $this->current();
		} else
			return null;
	}

	/**
	 * Contains one collectable with $name
	 * @param  int $index
	 * @return boolean
	 */
	public function containsIndex($index)
	{
		return parent::offsetExists($index);
	}

	/**
	 *
	 * @param array $array
	 * @return boolean
	 */
	public function containsAll($ids)
	{
		if( $this->isEmpty() || empty($ids) ){
			return false;
		}

		$containsAll = true;
		foreach( $ids as $index ){
			$containsAll = $containsAll && $this->containsIndex($index);
			if( false === $containsAll ){
				break;
			}
		}
		return $containsAll;
	}

	/**
	 *
	 * @param array $ids
	 * @return boolean
	 */
	public function containsAny($ids)
	{
		if( $this->isEmpty() || empty($ids) ){
			return false;
		}

		foreach( $ids as $index ){
			if( $this->containsIndex($index) ){
				return true;
			}
		}
		return false;
	}

	/**
	 * Remove one bean
	 * @param  int $index
	 */
	public function remove($index)
	{
		if( $this->containsIndex($index) )
			$this->offsetUnset($index);
	}

	/**
	 * Merge two Collection
	 * @param AbstractCollection $collection
	 * @return AbstractCollection
	 */
	public function merge(AbstractCollection $collection)
	{
		$collection->each($this->appendFunction($this));
		return $this;
	}

	/**
	 * @return Collection
	 */
	public function copy()
	{
		$newCollection = $this->newInstance();
		$this->each($this->appendFunction($newCollection));
		return $newCollection;
	}

	/**
	 * Diff two Collections
	 * @param Collection $collection
	 * @return Collection
	 */
	public function diff(AbstractCollection $collection)
	{
		$newCollection = $this->newInstance();
		$this->each(function(Collectable $collectable) use($newCollection, $collection){
			if( !$collection->containsIndex($collectable->getIndex()) ){
				$newCollection->append($collectable);
			}
		});
		return $newCollection;
	}

	/**
	 * Intersect two Collection
	 * @param Collection $collection
	 * @return Collection
	 */
	public function intersect(Collection $collection)
	{
		$newCollection = $this->newInstance();
		$this->each(function(Collectable $collectable) use($newCollection, $collection){
			if( $collection->containsIndex($collectable->getIndex()) ){
				$newCollection->append($collectable);
			}
		});
		return $newCollection;
	}

	/**
	 * Retrieve the array with primary keys
	 * @return array
	 */
	public function getPrimaryKeys()
	{
		return array_keys($this->getArrayCopy());
	}

	/**
	 * Retrieve the Collectable with primary key
	 * @param  int $name
	 * @return Collectable
	 */
	public function getByPK($index)
	{
		return $this->containsIndex($index) ? $this[$index] : null;
	}

	/**
	 * Is Empty
	 * @return boolean
	 */
	public function isEmpty()
	{
		return $this->count() == 0;
	}

	/**
	 *
	 * @param \Closure $callable
	 */
	public function each($callable)
	{
		$this->validateCallback($callable);

		$this->rewind();
		while( $this->valid() )
		{
			$collectable = $this->read();
			$callable($collectable);
		}
		$this->rewind();
	}

	/**
	 *
	 * @param \Closure $callable
	 * @return array
	 */
	public function map($callable)
	{
		$this->validateCallback($callable);

		$array = array();
		$this->each(function(AbstractBean $collectable) use(&$array, $callable){
			$mapResult = $callable($collectable);
			if( is_array($mapResult) ){
				foreach($mapResult as $key => $value){
					$array[$key] = $value;
				}
			}else{
				$array[] = $mapResult;
			}
		});

			return $array;
	}

	/**
	 *
	 * @param \Closure $callable
	 * @return Collection
	 */
	public function filter($callable)
	{
		$this->validateCallback($callable);

		$newCollection = $this->newInstance();
		$this->each(function(Collectable $collectable) use($newCollection, $callable){
			if( $callable($collectable) ){
				$newCollection->append($collectable);
			}
		});

			return $newCollection;
	}

	/**
	 * @param mixed $start
	 * @param callable $callable
	 * @return mixed
	 */
	public function foldLeft($start, $callable)
	{
		$this->validateCallback($callable);
		$result = $start;
		$this->each(function(Collectable $collectable) use(&$result, $callable){
			$result = $callable($result, $collectable);
		});
		return $result;
	}

	/**
	 *
	 * @param callable $callable
	 * @return boolean
	 */
	public function forall($callable)
	{
		if( $this->isEmpty() ) return false;
		$this->validateCallback($callable);
		return $this->foldLeft(true, function($boolean, Collectable $collectable) use($callable){
			return $boolean && $callable($collectable);
		});
	}

	/**
	 *
	 * @param callable $callable
	 * @return array
	 */
	public function partition($callable)
	{
		$this->validateCallback($callable);

		$collections = array();
		$getCollection = $this->collectionGenerator($collections);
		$this->each(function(Collectable $collectable) use($getCollection, $callable){
			$getCollection($callable($collectable))->append($collectable);
		});

			return $collections;
	}

	/**
	 * convert to array
	 * @return array
	 */
	public function toArray(){
		return $this->map(function(AbstractBean $collectable){
			return array($collectable->getIndex() => $collectable->toArray());
		});
	}


	/**
	 *
	 * @param array $collections
	 * @return \Closure
	 */
	private function collectionGenerator(array & $collections){
		$self = $this;
		$getCollection = function($index) use(&$collections, $self){
			if( !isset($collections[$index]) ){
				$collections[$index] = $self->newInstance();
			}
			return $collections[$index];
		};
		return $getCollection;
	}

}
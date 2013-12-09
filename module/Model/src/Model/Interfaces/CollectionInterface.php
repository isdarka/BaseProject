<?php
/**
 *
 * @author isdarka
 * @created Nov 23, 2013 10:28:39 AM
 */

namespace Model\Interfaces;

interface CollectionInterface
{
	/**
	 * Appends the value
	 * @param Collectable $collectable
	 */
	public function append($collectable);

	/**
	 * Return current array entry
	 * @return Collectable
	*/
	public function current();

	/**
	 * Return current array entry and
	 * move to next entry
	 * @return Collectable
	*/
	public function read();

	/**
	 * Get the first array entry
	 * if exists or null if not
	 * @return Collectable|null
	*/
	public function getOne();

	/**
	 * Remove one collectable with $name
	 * @param  int $index
	*/
	public function remove($index);

	/**
	 * Retrieve the array with primary keys
	 * @return array
	*/
	public function getPrimaryKeys();

	/**
	 * Retrieve the Collectable with primary key
	 * @param  int $name
	 * @return Collectable
	*/
	public function getByPK($index);

	/**
	 * Is Empty
	 * @return boolean
	*/
	public function isEmpty();

	/**
	 * convert to array
	 * @return array
	*/
	public function toArray();

	/**
	 * convert to json
	 * @return string
	*/
// 	public function toJson();
	
}

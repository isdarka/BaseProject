<?php
/**
 *
 * @author isdarka
 * @created Aug 26, 2013 6:21:30 PM
 */
namespace BaseProject\Model\Bean\Interfaces;

interface BeanInteface
{
	/**
	 *
	 * @return int
	 */
	public function getIndex();

	/**
	 * Convert to array
	 * @return array
	*/
	public function toArray();

	/**
	 * Convert to array
	 * @return array
	*/
	public function toArrayFor($fields);


}
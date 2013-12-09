<?php 

namespace Model\Interfaces;

interface BeanInterface
{
	/**
	 *
	 * @return int
	 */
	// public function getIndex();

	/**
	 * Convert to array
	 * @return array
	*/
	// public function toArray();

	/**
	 * Convert to array
	 * @return array
	*/
	public function toArrayFor($fields);


}
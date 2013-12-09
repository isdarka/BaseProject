<?php
/**
 *
 * @author isdarka
 * @created Nov 23, 2013 10:23:45 AM
 */

namespace Model\Bean;

use Model\Interfaces\BeanInterface;

abstract class AbstractBean  implements BeanInterface
{
	/**
	 *
	 * @return int
	 */
	abstract public function getIndex();
	
	/**
	 * (non-PHPdoc)
	 * @see \Model\Interfaces\BeanInteface::toArray()
	 */
	abstract public function toArray();
	
	/**
	 * Convert to array
	 * @return array
	*/
	final public function toArrayFor($fields){
		$array = array();
		$all = $this->toArray();
		foreach($fields as $field){
			if( array_key_exists($field, $all) ){
				$array[$field] = $all[$field];
			}
		}
		return $array;
	}
}
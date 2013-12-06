<?php
/**
 *
 * @author isdarka
 * @created Aug 26, 2013 6:23:27 PM
 */
namespace BaseProject\Model\Bean;

use BaseProject\Model\Bean\Interfaces\BeanInteface;

abstract class AbstractBean implements BeanInteface
{
	/**
	 * 
	 * @return int
	 */
	abstract public function getIndex(); 
	
	
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
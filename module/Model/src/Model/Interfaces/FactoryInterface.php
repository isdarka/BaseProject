<?php
/**
 *
 * @author isdarka
 * @created Nov 23, 2013 10:29:52 AM
 */

namespace Model\Interfaces;

interface FactoryInterface
{
	/**
	 * 
	 * @param array $array
	 */
	public static function createFromArray( $array);
	
	
	
	public static function populate($series, $fields);

}
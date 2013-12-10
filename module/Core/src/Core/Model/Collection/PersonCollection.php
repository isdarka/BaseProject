<?php

/**
 *
 * PersonBean
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Collection
 * @copyright 
 * @license 
 * @created Mon Dec 9 11:45:42 2013
 * @version 1.0
 */

namespace Core\Model\Collection;

use Model\Collection\AbstractCollection;

class PersonCollection extends AbstractCollection
{

		
 	/**
 	 *
 	 * @return array
 	 */
	public function toCombo() 
	{
		return $this->map(function(Person $person){
			return array( $person->getidPerson() => $person->getName() );
		});
	}
}
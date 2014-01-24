<?php

/**
 *
 * FileBean
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Collection
 * @copyright 
 * @license 
 * @created Mon Dec 23 12:44:25 2013
 * @version 1.0
 */

namespace Core\Model\Collection;

use Core\Model\Bean\File;
use Model\Collection\AbstractCollection;

class FileCollection extends AbstractCollection
{

		
 	/**
 	 *
 	 * @return array
 	 */
	public function toCombo() 
	{
		return $this->map(function(File $file){
			return array( $file->getidFile() => $file->getName() );
		});
	}
}
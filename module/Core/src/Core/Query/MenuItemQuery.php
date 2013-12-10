<?php

/**
 *
 * MenuItemQuery
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Query
 * @copyright 
 * @license 
 * @created Mon Dec 9 11:22:30 2013
 * @version 1.0
 */

namespace Core\Query;

use Query\Query;
use Core\Model\Metadata\MenuItemMetadata;

class MenuItemQuery extends Query
{

		
 	/**
 	 *
 	 * Contruct MenuItemQuery
 	 *
 	 */
	public function __construct($adapter) 
	{
		$this->metadata = new MenuItemMetadata();
		parent::__construct($adapter, $this->metadata->getTableName(), $this->metadata->getEntityName());
	}
}
<?php

/**
 *
 * MenuItemLogQuery
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Query
 * @copyright 
 * @license 
 * @created Sun Dec 8 22:26:30 2013
 * @version 1.0
 */

namespace Core\Query;

use Query\Query;
use Core\Model\Metadata\MenuItemLogMetadata;
use Core\Model\Bean\Log;

class MenuItemLogQuery extends Query
{

		
 	/**
 	 *
 	 * Contruct MenuItemLogQuery
 	 *
 	 */
	public function __construct($adapter) 
	{
		$this->metadata = new MenuItemLogMetadata();
		parent::__construct($adapter, $this->metadata->getTableName(), $this->metadata->getEntityName());
		$this->innerJoin(new Log());
	}
}
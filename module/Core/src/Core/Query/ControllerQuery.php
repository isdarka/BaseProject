<?php
/**
 *
 * @author isdarka
 * @created Nov 24, 2013 8:02:02 PM
 */

namespace Core\Query;

use Query\Query;
use Core\Model\Metadata\ControllerMetadata;
class ControllerQuery extends Query
{
	
	public function __construct($adapter)
	{
		$this->metadata = new ControllerMetadata();
		parent::__construct($adapter, $this->metadata->getTableName(), $this->metadata->getEntityName());
	}
	
}
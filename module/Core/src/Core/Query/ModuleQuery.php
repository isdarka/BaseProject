<?php
/**
 *
 * @author isdarka
 * @created Nov 24, 2013 8:02:02 PM
 */

namespace Core\Query;

use Query\Query;
use Core\Model\Metadata\ModelMetadata;
use Core\Model\Bean\ModuleBean;
class ModuleQuery extends Query
{
	
	public function __construct($adapter)
	{
		$this->metadata = new ModelMetadata();
		parent::__construct($adapter, $this->metadata->getTableName(), $this->metadata->getEntityName());
	}
	
}
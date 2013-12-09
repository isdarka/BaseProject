<?php
/**
 *
 * @author isdarka
 * @created Nov 26, 2013 4:00:28 PM
 */

namespace Core\Model\Catalog;



use Model\Catalog\AbstractCatalog;
use Core\Model\Metadata\ActionMetadata;
class ActionCatalog extends AbstractCatalog
{
	
	protected function getMetadata()
	{
		return new ActionMetadata();
	}
}
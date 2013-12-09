<?php
/**
 *
 * @author isdarka
 * @created Nov 24, 2013 6:24:15 PM
 */

namespace Core\Model\Catalog;

use Model\Catalog\AbstractCatalog;
use Core\Model\Metadata\ModelMetadata;
class ModuleCatalog extends AbstractCatalog
{
	/**
	 * 
	 * @return ModelMetadata
	 */
	protected function getMetadata()
	{
		return new ModelMetadata();
	}
}
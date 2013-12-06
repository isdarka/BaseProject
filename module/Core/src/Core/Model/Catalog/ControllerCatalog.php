<?php
/**
 *
 * @author isdarka
 * @created Nov 26, 2013 4:00:28 PM
 */

namespace Core\Model\Catalog;

use Model\Bean\AbstractBean;
use Core\Model\Exception\UserException;
use Core\Model\Bean\Person;
use Zend\Db\Sql\Predicate\Predicate;
use Zend\Db\Sql\Where;
use Core\Model\Metadata\ControllerMetadata;
use Model\Catalog\AbstractCatalog;

class ControllerCatalog extends AbstractCatalog
{
	
	protected function getMetadata()
	{
		return new ControllerMetadata();
	}
}
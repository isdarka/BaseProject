<?php
/**
 *
 * @author isdarka
 * @created Nov 24, 2013 8:09:44 PM
 */

namespace Core\Model\Collection;

use Model\Collection\AbstractCollection;
use Core\Model\Bean\ModuleBean;

class ModuleCollection extends AbstractCollection
{
	public function getByName($name)
	{
		$moduleBean = null;
		$this->each(function(ModuleBean $module) use ($name, &$moduleBean){
			if($module->getName() == $name){
				$moduleBean = $module;
			}
		});
		return $moduleBean;
	}
}
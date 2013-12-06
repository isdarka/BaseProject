<?php
/**
 *
 * @author isdarka
 * @created Nov 26, 2013 5:55:12 PM
 */
namespace Core\Model\Collection;

use Model\Collection\AbstractCollection;
use Core\Model\Bean\Controller;

class ControllerCollection extends AbstractCollection
{
	public function getByName($name)
	{
		$controllerBean = null;
		$this->each(function(Controller $controller) use ($name, &$controllerBean){
			if($controller->getName() == $name){
				$controllerBean = $controller;
			}
		});
		return $controllerBean;
	}
}
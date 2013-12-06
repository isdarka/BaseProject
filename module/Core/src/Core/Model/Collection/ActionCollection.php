<?php
/**
 *
 * @author isdarka
 * @created Nov 26, 2013 5:55:12 PM
 */
namespace Core\Model\Collection;

use Model\Collection\AbstractCollection;
use Core\Model\Bean\Action;

class ActionCollection extends AbstractCollection
{
	public function getByNameAndIdController($name, $idController)
	{
		$actionBean = null;
		$this->each(function(Action $action) use ($name, $idController, &$actionBean){
			if($action->getName() == $name && $action->getIdController() == $idController){
				$actionBean = $action;
			}
		});
		return $actionBean;
	}
	
	public function getAlgoIds()
	{
		return $this->map(function(Action $action){
			return array($action->getIdController() => $action->getIdController());
		});
	}
	
	/**
	 * 
	 * @param unknown $idController
	 * @return \Core\Model\Collection\ActionCollection
	 */
	public function getByIdController($idController)
	{
		$actionCollection = new ActionCollection();
		$this->each(function(Action $action) use ($idController, $actionCollection){
			if($action->getIdController() == $idController)
				$actionCollection->append($action);
		});
		
		return $actionCollection;
	}
}
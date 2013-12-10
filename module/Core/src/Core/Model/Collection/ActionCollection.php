<?php

/**
 *
 * ActionBean
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Collection
 * @copyright 
 * @license 
 * @created Mon Dec 9 11:45:42 2013
 * @version 1.0
 */

namespace Core\Model\Collection;

use Model\Collection\AbstractCollection;
use Core\Model\Bean\Action;

class ActionCollection extends AbstractCollection
{

		
 	/**
 	 *
 	 * Get Ids
 	 *
 	 * @return array
 	 */
	public function getControllerIds() 
	{
		return $this->map(function(Action $action){
			return array($action->getIdController() => $action->getIdController());
		});
	}
		
 	/**
 	 *
 	 * Get Ids
 	 *
 	 * @return ActionCollection
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
		
 	/**
 	 *
 	 * @return array
 	 */
	public function toCombo() 
	{
		return $this->map(function(Action $action){
			return array( $action->getIdAction() => $action->getName() );
		});
	}
	
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
}
<?php
/**
 *
 * @author isdarka
 * @created Dec 4, 2013 6:18:57 PM
 */

namespace Core\Model\Bean;

use Model\Bean\AbstractBean;
class Action extends AbstractBean
{
	const TABLENAME = 'core_actions';
	
	const ID_ACTION = 'id_action';
	const ID_CONTROLLER = 'id_controller';
	const NAME = 'name';
	
	private $idAction;
	private $idController;
	private $name;
	
	public function getIndex()
	{
		return $this->idAction;
	}
	
	public function setIdAction($idAction)
	{
		$this->idAction = $idAction;
		return $this;
	}
	
	public function getIdAction()
	{
		return $this->idAction;
	}
	
	public function setIdController($idController)
	{
		$this->idController = $idController;
		return $this;
	}
	
	public function getIdController()
	{
		return $this->idController;
	}
	
	public function setName($name)
	{
		$this->name = $name;
		return $this;
	}
	
	public function getName()
	{
		return $this->name;
	}
	
	
	public function toArray()
	{
		return array(
				self::ID_ACTION => $this->getIdAction(),
				self::ID_CONTROLLER => $this->getIdController(),
				self::NAME => $this->getName(),
		);
	}
}
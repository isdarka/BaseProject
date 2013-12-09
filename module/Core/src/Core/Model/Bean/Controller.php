<?php
/**
 *
 * @author isdarka
 * @created Dec 4, 2013 5:51:37 PM
 */

namespace Core\Model\Bean;


use Model\Bean\AbstractBean;
class Controller extends AbstractBean
{
	const TABLENAME = 'core_controllers';
	
	const ID_CONTROLLER = 'id_controller';
	const ID_MODULE = 'id_module';
	const NAME = 'name';
	
	private $idController;
	private $idModule;
	private $name;
	
	public function getIndex()
	{
		return $this->idController;
	}
	
	public function setIdController($idController)
	{
		$this->idController = $idController;
	}
	
	public function getIdController()
	{
		return $this->idController;
	}
	
	public function setIdModule($idModule)
	{
		$this->idModule = $idModule;
	}
	
	public function getIdModule()
	{
		return $this->idModule;
	}
	
	public function setName($name)
	{
		$this->name = $name;
	}
	
	public function getName()
	{
		return $this->name;
	}
	
	public function toArray()
	{
		return array(
				self::ID_CONTROLLER => $this->getIdController(),
				self::ID_MODULE => $this->getIdModule(),
				self::NAME => $this->getName(),
		);
	}
}
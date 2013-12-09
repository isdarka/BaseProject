<?php
/**
 *
 * @author isdarka
 * @created Sep 16, 2013 9:23:47 PM
 */
namespace Core\Model\Bean;

use Model\Bean\AbstractBean;

class ModuleBean extends AbstractBean 
{
	const TABLENAME = "core_modules";
	const ID_MODULE = 'id_module';
	const NAME = 'name';
	/**
	 * 
	 * @var int
	 */
	private $idModule;
	
	/**
	 * 
	 * @var string
	 */
	private $name;

	/**
	 * (non-PHPdoc)
	 * @see \Model\Bean\AbstractBean::getIndex()
	 */
	public function getIndex()
	{
		return $this->idModule;
	}
	
	/**
	 * 
	 * @param int $idModule
	 */
	public function setIdModule($idModule)
	{
 		$this->idModule = (int) $idModule;
	}
	
	/**
	 * 
	 * @param string $name
	 */
	public function setName($name)
	{
		$this->name = (string) $name;
	}
	
	/**
	 * 
	 * @return number
	 */
	public function getIdModule()
	{
		return $this->idModule;
	}
	
	/**
	 * 
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \Model\Bean\AbstractBean::toArray()
	 */
	public function toArray()
	{
		return array(
				"id_module" => $this->idModule,
				"name" => $this->name,
		);
	}
	
	
}
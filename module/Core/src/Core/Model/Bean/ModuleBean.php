<?php
/**
 *
 * @author isdarka
 * @created Sep 16, 2013 9:23:47 PM
 */
namespace Core\Model\Bean;
use BaseProject\Model\Bean\AbstractBean;

class ModuleBean extends AbstractBean
{

	/**
	 * 
	 * @var int
	 */
	private $_idModule;
	
	/**
	 * 
	 * @var string
	 */
	private $_name;

	
	/**
	 * (non-PHPdoc)
	 * @see \BaseProject\Model\Bean\AbstractBean::getIndex()
	 */
	public function getIndex()
	{
		return $this->_idModule;
	}
	
	/**
	 * 
	 * @param int $idModule
	 */
	public function setIdModule( $idModule)
	{
 		$this->_idModule = (int) $idModule;
	}
	
	/**
	 * 
	 * @param string $name
	 */
	public function setName($name)
	{
		$this->_name = (string) $name;
	}
	
	/**
	 * 
	 * @return number
	 */
	public function getIdModule()
	{
		return $this->_idModule;
	}
	
	/**
	 * 
	 * @return string
	 */
	public function getName()
	{
		return $this->_name;
	}
	
	
	public function toArray()
	{
		return array(
				"idModule" => $this->_idModule,
				"name" => $this->_name,
		);
	}
}
<?php
/**
 * 
 * @author isdarka
 * @created
 * @namespace
 * @package
 */
namespace Israel\Model\Entity;

class Person
{
	private $_name;
	private $_lastName;
	private $_id;

	/**
	 * 
	 * @param Int $id
	 * @throws \Exception
	 */
	public function setId($id)
	{
// 		if(gettype($id) != "integer")
		if(!is_int($id))
			throw new \Exception("Must be an integer");
		$this->_id = $id;
		
	}
	public function setName($name)
	{
// 		echo gettype($name);
		$this->_name = $name;
	}
	
	public function toArray(){
		return array(
			"name" => $this->_name,
		);
	}
	
	public function __toString()
	{
		return $this->_name;
	}
}
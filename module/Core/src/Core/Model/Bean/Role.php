<?php
/**
 *
 * @author isdarka
 * @created Dec 4, 2013 6:42:50 PM
 */

namespace Core\Model\Bean;

use Model\Bean\AbstractBean;
class Role extends AbstractBean
{
	const TABLENAME = 'core_roles';
	
	const ID_ROLE = 'id_role';
	const NAME = 'name';
	const STATUS = 'status';
	
	private $idRole;
	private $name;
	private $status;
	
	const ENABLE = 1;
	const DISABLE = 0;
	
	public function getIndex()
	{
		return $this->idRole;
	}
	
	public function setIdRole($idRole)
	{
		$this->idRole = $idRole;
		return $this;
	}
	
	public function getIdRole()
	{
		return $this->idRole;
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
	
	public function setStatus($status)
	{
		$this->status = $status;
		return $this;
	}
	
	public function getStatus()
	{
		return $this->status;
	}
	
	public function toArray()
	{
		return array(
				self::ID_ROLE => $this->getIdRole(),
				self::NAME => $this->getName(),
				self::STATUS => $this->getStatus(),
		);
	}
	
	public static $statusString = array(
			self::ENABLE => 'Enabled',
			self::DISABLE => 'Disabled',
	
	);
	
	public function isEnabled()
	{
		return self::ENABLE == $this->getStatus();
	}
	
	public function isDisabled()
	{
		return self::DISABLE == $this->getStatus();
	}
	
	public function getStatusString()
	{
		return self::$statusString[$this->getStatus()];
	}
	
}

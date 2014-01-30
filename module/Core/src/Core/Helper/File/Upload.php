<?php
/**
 *
 * @author isdarka
 * @created Dec 23, 2013 12:06:43 PM
 */

namespace Core\Helper\File;

use Zend\File\Transfer\Adapter\Http;
use Zend\Validator\File\Extension;
use Core\Model\Bean\File;
use Zend\Filter\File\Rename;
class Upload extends Http
{
	private $type;
	private $file;
	private $fileName;
	public function __construct(File $file)
	{
		parent::__construct();
		$this->file = $file;
	}
	
	public function setDestination()
	{
		parent::setDestination(self::$destinations[$this->type]);	
	}
	
	public function setType($type)
	{
		$this->type = $type;
	}
	
	public function getType($type)
	{
		return $this->type;
	}
	
	public function receive($files = null)
	{
		$this->renameFile();
		parent::receive($files);
	}
	
	private function renameFile()
	{
		
		$originalFilename = pathinfo($this->getFileName());

		$newName = $this->file->getIdFile().".". $originalFilename['extension'];
		
		$this->file->setName($newName);
		$filter = new Rename($newName);
		$this->addFilter($filter);
		$this->fileName = $newName;
	}
	
	public function setValidators()
	{
		parent::setValidators(array(new Extension(self::$extensions[$this->type])));
	}
	
	const AVATAR = 1;
	
	public static $destinations = array(
			self::AVATAR => "public/images/avatar",
	);
	
	public static $publicDestinations = array(
			self::AVATAR => "images/avatar",
	);
	public static $extensions = array(
			self::AVATAR => array("png","jpg","gif","jpeg"),
	);
}
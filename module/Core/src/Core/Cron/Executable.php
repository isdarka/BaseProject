<?php

namespace Core\Cron;

/**
 *
 * @author isdarka
 *        
 */
class Executable 
{
	/**
	 * 
	 * @var \DateTime
	 */
	private $now;
	
	/**
	 * 
	 * @var \DateTime
	 */
	private $nowPlusFive;
	
	/**
	 * 
	 * @var \ArrayIterator
	 */
	private $dates;
	
	/**
	 * 
	 * @param \DateTime $now
	 * @param \DateTime $nowPlusFive
	 */
	public function __construct(\DateTime $now, \DateTime $nowPlusFive)
	{
		$this->dates = new \ArrayIterator();
		
		$this->now = clone $now;
		$this->nowPlusFive = clone $nowPlusFive;
	}
	
	/**
	 * 
	 * @param string $time
	 * @param string $format
	 */
	public function addTime($time, $format = "H:i:s")
	{
		$dateTime = \DateTime::createFromFormat($format, $time);
		
		$this->dates->append($dateTime);
	}
	
	/**
	 * 
	 * @return boolean
	 */
	public function isExcutable()
	{
		/* @var $dateTime \DateTime */
		foreach ($this->dates as $dateTime)
		{
			if($dateTime >= $this->now && $dateTime <= $this->nowPlusFive)
				return true;
		}
		
		return false;
	}
}

?>
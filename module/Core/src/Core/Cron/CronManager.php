<?php

namespace Core\Cron;

use Zend\Db\Adapter\Adapter;
/**
 *
 * @author isdarka
 *        
 */
final class CronManager
{
	protected $cronables;
	
	public function __construct(Adapter $adapter) {
		$this->cronables = new \ArrayIterator();
	}
	
	/**
	 *
	 * @param Cronable $cronable
	 */
	public function addCronable(Cronable $cronable)
	{
		$this->cronables->append($cronable);
	}
	
	/**
	 * 
	 * @return \ArrayIterator
	 */
	public function getCronables()
	{
		return $this->cronables;
	}
	
	public function run()
	{
		$now = new \DateTime("now");
		/* @var $cronable AbstractCron */
		foreach ($this->getCronables() as $cronable)
		{
			$cronable->setNow($now);
			if($cronable->isActive() && $cronable->isExcecutable()){
				$cronable->run();
			}
		}
	}
}

?>
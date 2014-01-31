<?php


namespace Core\Controller;


use BaseProject\Controller\BaseController;
use Core\Cron\Executable;
class CronController extends BaseController
{
	protected  function hasIdentity()
	{
		return true;
	}
	
	public function jobsAction()
	{
		$now = new \DateTime("now");
		$nowPlusFive = clone $now;
		$nowPlusFive->add(new \DateInterval("PT5M"));
		
		$executable = new Executable($now, $nowPlusFive);
		$executable->addTime("06:00:00");
		$executable->addTime("11:40:00");
		$executable->addTime("12:00:00");
		$executable->isExcutable();
// 		die("Cron");
	}
	
}
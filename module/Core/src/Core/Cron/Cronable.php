<?php

namespace Core\Cron;

/**
 *
 * @author isdarka
 *        
 */
interface Cronable 
{
	/**
	 * Run Cronable
	 */
	public function run();
	
	/**
	 * If is Active is excecuted
	 * 
	 * @return bool
	 */
	public function isActive();
	
	/**
	 * Verifify if is Excecutable
	 * 
	 * @return bool
	 */
	public function isExcecutable();
	
}

?>
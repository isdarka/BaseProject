<?php
/**
 *
 * @author isdarka
 * @created Nov 11, 2013 8:46:55 PM
 */
// namespace BaseProject\Query;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorAwareTrait;
class Demo implements ServiceLocatorAwareInterface
{
	use ServiceLocatorAwareTrait;
	public function getSL()
	{
		var_dump($this->getServiceLocator());
	}
	
// <?php
// namespace My;

// use Zend\ServiceManager\ServiceLocatorAwareInterface;
// use Zend\ServiceManager\ServiceLocatorAwareTrait;

// class MyClass implements ServiceLocatorAwareInterface{
// 	use ServiceLocatorAwareTrait;


// 	public function doSomething(){
// 		$sl = $this->getServiceLocator();
// 		$logger = $sl->get( 'My\CusomLogger')
// 	}
}
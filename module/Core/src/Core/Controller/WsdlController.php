<?php
/**
 * wsdlController
 *
 * @author
 *
 * @version
 *
 */

namespace Core\Controller;

use BaseProject\Controller\BaseController;
use Zend\Soap\Server;
use Zend\Soap\AutoDiscover;
class WsdlController extends BaseController 
{
	protected  function hasIdentity()
	{
		return true;
	}
	/**
	 * The default action - show the home page
	 */
	public function soapAction() {
		ini_set("soap.wsdl_cache_enabled", "0");
		try{
			$soapServer = new Server('http://tools.local/wsdl');
			$soapServer->setClass('Core\Service\Services');
			$soapServer->handle();
		}catch (\SoapFault $e){
			var_dump($e->getMessage());
		}
		
		return $this->getResponse();

	}
	
	
	public function wsdlAction()
	{
		$autoDiscover = new AutoDiscover();
		$autoDiscover->setClass('Core\Service\Services');
		$autoDiscover->setUri('http://tools.local/soap');
		$autoDiscover->setServiceName("Service");
		$autoDiscover->handle();
		return $this->getResponse();
	}
}
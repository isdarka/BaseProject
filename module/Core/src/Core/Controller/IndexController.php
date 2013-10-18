<?php


namespace Core\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use BaseProject\Controller\BaseController;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Form\Annotation\Object;






class IndexController extends BaseController
{
// 		protected $services;
	
// 		public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
// 		{
// // 			var_dump($serviceLocator);
// // 			var_dump($serviceLocator->get("Zend\Db\Adapter"));
// // 			die();
// 			$this->services = $serviceLocator;
// 		}
	
// 		public function getServiceLocator()
// 		{
// 			return $this->services;
// 		}
	
// 		public function dispatch(Request $request, Response $response = null)
// 		{
// 			// ...
	
// 			// Retrieve something from the service manager
// 			$router = $this->getServiceLocator()->get('Router');
	
// 			// ...
// 		}
	public function indexAction()
	{
// 		var_dump($this->getServiceLocator()->get("Adapter"));
// 		die("asd");
// 		$demo = new \ArrayObject();
		$demo = new \stdClass();
		$demo->test = "asds";
// 		$demo[0]->teasdsd = "asdasds";
foreach ($demo as $key => $value)
{
		var_dump($key);
		var_dump($value);
	
}
		$view = new ViewModel(array("test" => "test"));
		$view->setTemplate("layout/layout.phtml");
		var_dump($view->getTemplate());
		return $view;
// 		return new ViewModel(
// 		);
	}
}
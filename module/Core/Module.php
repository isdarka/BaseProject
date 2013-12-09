<?php


namespace Core;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Core\Service\ServiceConfiguration ;
use Core\View\Helper\AbsoluteUrl;
use Core\View\Helper\I18n;
use Core\Model\Bean\ModuleBean;
use Zend\ServiceManager\ServiceManager;
use Zend\Mail\Transport\SmtpOptions;
use Zend\Mail\Transport\Smtp;
use Zend\EventManager\EventManager;
use Zend\Http\PhpEnvironment\Request;
use Zend\Mail\Message;

class Module
{
	
	
	public function onBootstrap(MvcEvent $e)
	{
		$eventManager        = $e->getApplication()->getEventManager();
// 		($eventManager);
		$moduleRouteListener = new ModuleRouteListener();
		$moduleRouteListener->attach($eventManager);
		$eventManager->attach(\Zend\Mvc\MvcEvent::EVENT_DISPATCH_ERROR, array($this, 'onDispatchError'));
		
		
// 		$e->getApplication()->getServiceManager()->get('ViewHelperManager')->setAlias('i18n->_', 'translate');
// 		$eventManager = $e->getApplication()->getEventManager();
// 		$moduleRouteListener = new ModuleRouteListener();
// 		$moduleRouteListener->attach($eventManager);
		/**
		 * Log any Uncaught Errors
		*/
// 		$eventManager instanceof EventManager;
// 		var_dump($eventManager->getSharedManager());
// 		$sharedManager = $e->getApplication()->getEventManager()->getSharedManager();
// 		$sm = $e->getApplication()->getServiceManager();
// 		$sharedManager->attach('Zend\Mvc\Application', 'dispatch.error',
// 				function($e){
// 					var_dump($e->getParam('exception'));
					
// // 					if ($e->getParam('exception')){
// // 						var_dump($e->getParam('exception'));
// // // 						$sm->get('Logger')->crit($e->getParam('exception'));
// // 					}
// 				}
// 		);
	}

	public function onDispatchError(MvcEvent $e)
	{
		
		
// 		$sm = $e->getApplication()->getServiceManager();
		
// // 		var_dump($sm);
// 		$transport = $sm->get('mail.transport');
			
			
			
		
// 		$message = new Message();
// 		// 			$message->
// 		$message->addTo('irvelasco@pcsmexico.com')
// 		->addFrom('irvelasco@pcsmexico.com')
// 		->setSubject('Greetings and Salutations!')
// 		->setBody("Sorry, I'm going to be late today!");
			
// 		// Setup SMTP transport using LOGIN authentication
// 		// 			$transport = new SmtpTransport();
// 		// 			$options   = new SmtpOptions(array(
// 		// 					'name'              => 'localhost.localdomain',
// 		// 					'host'              => '127.0.0.1',
// 		// 					'connection_class'  => 'login',
// 		// 					'connection_config' => array(
// 		// 							'username' => 'user',
// 		// 							'password' => 'pass',
// 		// 					),
// 		// 			));
// 		// 			$transport->setOptions($options);
// 					$transport->send($message);
		
// 		var_dump($e->getParam("error"));
// 		$result = $e->getResult();
// 		$request = $e->getRequest();
// 		$request instanceof Request;
// 		var_dump($request->getRequestUri());
// 		var_dump($e->getParams());
// 		die("AAA");
	}
	public function getConfig()
	{
		return include __DIR__ . '/config/module.config.php';
	}

	public function getAutoloaderConfig()
	{
		return array(
				'Zend\Loader\StandardAutoloader' => array(
						'namespaces' => array(
								__NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
						),
				),
		);
	}
	public function getServiceConfig()
	{
		return array(
				'factories' => array(
						'mail.transport' => function (ServiceManager $serviceManager) {
							$config = $serviceManager->get('Config');
							$transport = new Smtp();
							$transport->setOptions(new SmtpOptions($config['mail']['transport']['options']));
		
							return $transport;
						},
				),
		);
// 		die("TEST");
// new te();
// 		return new ServiceConfiguration();
// 		return new Service\ServiceConfiguration();
// 		return array(
// 				'initializers' => array(
// 						function ($instance, $sm) {
// 							if ($instance instanceof \Zend\Db\Adapter\AdapterAwareInterface) {
// 								$instance->setDbAdapter($sm->get('Zend\Db\Adapter\Adapter'));
// 							}
// 						}
// 				),
					
// 				'factories' => array(
// 						'Module' =>  function($sm){
// 							$module     = new ModuleBean();
// 							return $module;
// 						},
// 				),
					
// 		);
	}
	
	
	public function getViewHelperConfig()
	{
		return array(
				'factories' => array(
						
						// the array key here is the name you will call the view helper by in your view scripts
						'absoluteUrl' => function($sm) {
							$locator = $sm->getServiceLocator(); // $sm is the view helper manager, so we need to fetch the main service manager
							return new AbsoluteUrl($locator->get('Request'));
						},
						'i18n' => function($sm) {
// 							$locator = $sm->getServiceLocator(); // $sm is the view helper manager, so we need to fetch the main service manager
							$translator = $sm->getServiceLocator()->get("MvcTranslator");
// 							die();
							return new I18n($translator);
						},
				),
		);
		
	}
	
}
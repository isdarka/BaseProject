<?php
/**
 *
 * @author isdarka
 * @created Sep 17, 2013 2:55:44 PM
 */
namespace Core\ServiceConfiguration;


use Zend\ServiceManager\Config;
use Zend\ServiceManager\ServiceManager;
class ServiceConfiguration extends Config
{
	public function configureServiceManager(ServiceManager $serviceManager)
	{
// 		$serviceManager->addInitializer($initializer)
die("hola");
		$serviceManager->setFactory("Adapter", 
										function($sm){
											return $sm->get("Zend\Db\Adapter");
									}
					);
		/*
		
		$serviceManager->setFactory('User', 'SomeModule\Service\UserFactory');
		$serviceManager->setFactory('UserForm', function ($serviceManager) {
			$form = new Form\User();
	
			// Retrieve a dependency from the service manager and inject it!
			$form->setInputFilter($serviceManager->get('UserInputFilter'));
			return $form;
		});
		$serviceManager->setInvokableClass('UserInputFilter', 'SomeModule\InputFilter\User');
		$serviceManager->setService('Auth', new Authentication\AuthenticationService());
		$serviceManager->setAlias('SomeModule\Model\User', 'User');
		$serviceManager->setAlias('AdminUser', 'User');
		$serviceManager->setAlias('SuperUser', 'AdminUser');
		$serviceManager->setShared('UserForm', false);*/
	}
	
} 
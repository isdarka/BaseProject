<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'router' => array(
        'routes' => array(
        		//Home from project
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'Core\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /Core/:controller/:action
            'core' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/core',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Core\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action][/:id][page/:page]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '[0-9]*',
                                /**
                                 * Variable y tipo de dato que recibe con expresion regular
                                 */
//                                'id' => '[0-9]*',
//                                 'id2' => '[a-z]*',
//                                 'id3' => '[a-z]*',
                            ),
                            'defaults' => array(
// 	                            'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
// 	                            'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
// 								'id' => '[0-9]',
                                                ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator',
        ),
    ),
    'translator' => array(
        'locale' => 'es_ES',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'service_manager' => array(
	    'factories' => array(
	    		// Keys are the service names.
	    		// Valid values include names of classes implementing
	    		// FactoryInterface, instances of classes implementing
	    		// FactoryInterface, or any PHP callbacks
	    		'Adapter' => function ($serviceManager) {
	    			return $serviceManager->get("Zend\Db\Adapter");
	    		},
	    ),
    ),
    /**
     * Se dan de alta los controllers a los que se puede ingresar
     */
    'controllers' => array(
        'invokables' => array(
            	'Core\Controller\Index' => 'Core\Controller\IndexController',
        		'Core\Controller\User' => 'Core\Controller\UserController',
        		'Core\Controller\Menu' => 'Core\Controller\MenuController',
        		'Core\Controller\Role' => 'Core\Controller\RoleController',
        		'Core\Controller\Auth' => 'Core\Controller\AuthController',
        		'Core\Controller\MenuItem' => 'Core\Controller\MenuItemController',
        		
        ),
    ),
    'view_manager' => array(
    		'default_suffix' => 'tpl', // <-- new option for path stack resolver
    		'display_not_found_reason' => true,
    		'display_exceptions'       => true,
    		'doctype'                  => 'HTML5',
    		'not_found_template'       => 'error/404',
    		'exception_template'       => 'error/index',
    		'template_map' => array(
    				'layout/layout'           => __DIR__ . '/../view/layout/layout.tpl',
    				'application/index/index' => __DIR__ . '/../view/application/index/index.tpl',
    				'error/404'               => __DIR__ . '/../view/error/404.tpl',
    				'error/index'             => __DIR__ . '/../view/error/index.tpl',
    		),
    		'template_path_stack' => array(
    				__DIR__ . '/../view',
    		),
    		'strategies' => array(
    				'ViewJsonStrategy',
    		),
    ),
//     'view_manager' => array(
//         'display_not_found_reason' => true,
//         'display_exceptions'       => true,
//         'doctype'                  => 'HTML5',
//         'not_found_template'       => 'error/404',
//         'exception_template'       => 'error/index',
//         'template_map' => array(
//             'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
//             'core/index/index' => __DIR__ . '/../view/core/index/index.phtml',
//             'error/404'               => __DIR__ . '/../view/error/404.phtml',
//             'error/index'             => __DIR__ . '/../view/error/index.phtml',
//         ),
//         'template_path_stack' => array(
//              __DIR__ . '/../view',
//         ),
//     ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
);

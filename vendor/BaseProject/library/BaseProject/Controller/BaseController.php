<?php
/**
 *
 * @author isdarka
 * @created Aug 25, 2013 11:03:24 PM
 */

namespace BaseProject\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\MvcEvent;
use Zend\View\Model\ViewModel;
use Zend\Stdlib\ArrayObject;
use Zend\Stdlib\RequestInterface as Request;
use Zend\Stdlib\ResponseInterface as Response;
use Zend\ServiceManager\ServiceManager;
use Core\View\Helper\I18n;
use Zend\Http\Response as HttpResponse;
use Zend\Mvc\Controller\Plugin\Params;
use Zend\Mvc\I18n\Translator;
use Zend\Authentication\AuthenticationService;
use BaseProject\Security\AuthStorage;
use Core\Model\Bean\User;
use BaseProject\Menu\MenuRender;
use BaseProject\Security\Acl;

class BaseController extends AbstractActionController
{
	
	protected $view;
	
	protected $maxPerPage = 20;
	/* @var $i18n Zend\Mvc\I18n\Translator */
	public $i18n;
	
	public function __construct(){
		$this->view  = new ViewModel();
	}
	
	protected function renderMenu()
	{
		$menuRender = new MenuRender($this->getAdatper(), $this->getBasePath(), $this->getUser());
		$this->view->systemMenu = $menuRender->render();
	}
	
	protected  function hasIdentity()
	{
		if(!$this->getAuthenticationService()->hasIdentity())
			$this->redirect()->toRoute(null,array('module' => 'core',  'controller'=>'auth','action' => 'login',));
		else{
			$this->renderMenu();
			$acl = $this->getAcl();
			$controller = $this->params()->fromRoute("controller");
			$controller = $this->getUnderscore($controller);
			$action = $this->params()->fromRoute("action");
			$resource = strtolower($controller) . "::" . strtolower($action);
			if(!$acl->hasResource($resource)){
				$this->redirect()->toRoute(null, array(
						'module' => 'core',
						'controller' => 'index',
						'action' =>  'index',
				));
				$this->flashMessenger()->addErrorMessage("You don't have permission ");
			}elseif(!$acl->isAllowed($this->getUser()->getIdRole(), $resource))
			{
				$this->flashMessenger()->addErrorMessage("You don't have permission ");
				$this->redirect()->toRoute(null, array(
						'module' => 'core',
						'controller' => 'index',
						'action' =>  'index',
				));
			}
		}
	}
	
	
	public function onDispatch(MvcEvent $e)
	{
		$this->view->i18n = $this->i18n;
		$this->view->baseUrl = $this->getBasePath();
		$this->view->flashMessenger = $this->flashMessenger();
		return parent::onDispatch($e);
	}
	
	/**
	 * First Execute dispact after onDispatch
	 * (non-PHPdoc)
	 * @see \Zend\Mvc\Controller\AbstractController::dispatch()
	 */
	public function dispatch(Request $request, Response $response = null)
	{
		$this->hasIdentity();
		$this->tranlate();
		return parent::dispatch($request, $response);
	}
	
	public function getBasePath()
	{
		$event = $this->getEvent();
		$request = $event->getRequest();
		$router = $event->getRouter();
		$uri = $router->getRequestUri();
		return $baseUrl = sprintf('%s://%s%s', $uri->getScheme(), $uri->getHost(), $request->getBaseUrl());
	}
	
	protected function tranlate()
	{
		$viewHelper = $this->getServiceLocator()->get('viewHelperManager');
		$translate = $viewHelper->get("translate");
		$this->i18n = $translate->getTranslator();
	}
	
	protected function getAuthenticationService()
	{
		return new AuthenticationService();
	}
	
	protected  function getAuthStorage()
	{
		return new AuthStorage();
	}
	
	/**
	 * 
	 * @return User
	 */
	protected function getUser()
	{
		$authStorage = $this->getAuthStorage()->read();
		return $authStorage["user"];
	}
	
	/**
	 *
	 * @return Acl
	 */
	protected function getAcl()
	{
		$authStorage = $this->getAuthStorage()->read();
		return $authStorage["acl"];
	}
	
	protected function attachDefaultListeners()
	{
		$events = $this->getEventManager();
		$events->attach(MvcEvent::EVENT_DISPATCH, array($this, 'onDispatch'),2);
		$events->attach(MvcEvent::EVENT_DISPATCH_ERROR, array($this, 'onDispatchError'),10);
		$events->attach(MvcEvent::EVENT_FINISH, array($this, 'onFinish'));
		$events->attach(MvcEvent::EVENT_RENDER, array($this, 'onRender'));
		$events->attach(MvcEvent::EVENT_RENDER_ERROR, array($this, 'onRenderError'));
		
	}
	
	public function onDispatchError(MvcEvent $e)
	{
		die("DE");
	}
	
// 	public function onRender(MvcEvent $e)
// 	{
// 		var_dump("asdas");
// 		die("RE");
// 	}
	
	public function onRenderError(MvcEvent $e)
	{
		var_dump("asdas");
		die("RERRO");
	}
	
// 	protected function onFinish(MvcEvent $e)
// 	{
// 		var_dump("asdas");
// 		die("as");
// 	}
	
	/**
	 * (non-PHPdoc)
	 * @see \Zend\Mvc\Controller\AbstractActionController::notFoundAction()
	 */
	public function notFoundAction()
	{
		$this->view->setTemplate("error/404.tpl");
		return parent::notFoundAction();
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \Zend\Mvc\Controller\AbstractActionController::createHttpNotFoundModel()
	 */
	protected function createHttpNotFoundModel(HttpResponse $response)
	{
		$response->setStatusCode(404);
		$this->view->content = 'Page not found';
		return $this->view;
	}
	
	/**
	 * 
	 * @return Zend\Db\Adapter\Adapter
	 */
	protected function getAdatper()
	{
		return $this->getServiceLocator()->get("Adapter");
	} 
	
	
	public function getCamelCase($string)
	{
		return lcfirst(join("", array_map("ucwords", explode("_", $string))));
	}
	
	public function getUnderscore($string)
	{
		return strtolower(preg_replace('/(?<=[a-z])([A-Z])/', '-$1', $string));
	}
}
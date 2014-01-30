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
use Zend\Paginator\Adapter\Null;
use Zend\Paginator\Paginator;
use Core\Query\UserQuery;

/**
 * BaseController
 * @author isdarka 
 *
 * Convenience methods for pre-built plugins (@see __call):
 *
 * @method \Zend\View\Model\ModelInterface acceptableViewModelSelector(array $matchAgainst = null, bool $returnDefault = true, \Zend\Http\Header\Accept\FieldValuePart\AbstractFieldValuePart $resultReference = null)
 * @method bool|array|\Zend\Http\Response fileprg(\Zend\Form\Form $form, $redirect = null, $redirectToUrl = false)
 * @method bool|array|\Zend\Http\Response filePostRedirectGet(\Zend\Form\Form $form, $redirect = null, $redirectToUrl = false)
 * @method \Zend\Mvc\Controller\Plugin\FlashMessenger flashMessenger()
 * @method \Zend\Mvc\Controller\Plugin\Forward forward()
 * @method mixed|null identity()
 * @method \Zend\Mvc\Controller\Plugin\Layout|\Zend\View\Model\ModelInterface layout(string $template = null)
 * @method \Zend\Mvc\Controller\Plugin\Params|mixed params(string $param = null, mixed $default = null)
 * @method \Zend\Http\Response|array prg(string $redirect = null, bool $redirectToUrl = false)
 * @method \Zend\Http\Response|array postRedirectGet(string $redirect = null, bool $redirectToUrl = false)
 * @method \Zend\Mvc\Controller\Plugin\Redirect redirect()
 * @method \Zend\Mvc\Controller\Plugin\Url url()
 */
class BaseController extends AbstractActionController
{
	
	protected $view;
	
	protected $maxPerPage = 10;
	/* @var $i18n Zend\Mvc\I18n\Translator */
	protected $i18n;
	
	public function __construct(){
		$this->view  = new ViewModel();
	}
	
	protected function renderMenu()
	{
		$menuRender = new MenuRender($this->getAdapter(), $this->getBasePath(), $this->getUser());
		$this->view->systemMenu = $menuRender->render();
	}
	
	protected  function hasIdentity()
	{
		if(!$this->getAuthenticationService()->hasIdentity()){
			$this->plugin("redirect")->toUrl($this->getBasePath());
			return false;
		}else{
			$this->renderMenu();
			$acl = $this->getAcl();
			$controller = $this->params()->fromRoute("controller");
			$controller = $this->getUnderscore($controller);
			$action = $this->params()->fromRoute("action");
			$resource = strtolower($controller) . "::" . strtolower($action);
			if(!$acl->hasResource($resource)){
				$this->redirect()->toRoute("core", array(
						'module' => 'core',
						'controller' => 'index',
						'action' =>  'index',
				));
				$this->flashMessenger()->addErrorMessage("You don't have permission ");
				return false;
			}elseif(!$acl->isAllowed($this->getUser()->getIdRole(), $resource))
			{
				$this->flashMessenger()->addErrorMessage("You don't have permission ");
				$this->redirect()->toRoute("core", array(
						'module' => 'core',
						'controller' => 'index',
						'action' =>  'index',
				));
				return false;
			}
		}
		return true;
	}
	
	
	public function onDispatch(MvcEvent $e)
	{
		$this->view->i18n = $this->i18n;
		$this->view->baseUrl = $this->getBasePath();
		$this->view->flashMessenger = $this->flashMessenger();
		
		if($this->getUser() instanceof User)
		{
			$userQuery = new UserQuery($this->getAdapter());
			$userQuery->whereAdd(User::ID_USER, $this->getUser()->getIdUser(), UserQuery::NOT_EQUAL);
			$userQuery->whereAdd(User::STATUS, User::ENABLE);
			$users = $userQuery->find();
			
			$this->view->messageUsers = $users;
		}
		
		return parent::onDispatch($e);
	}
	
	/**
	 * First Execute dispact after onDispatch
	 * (non-PHPdoc)
	 * @see \Zend\Mvc\Controller\AbstractController::dispatch()
	 */
	public function dispatch(Request $request, Response $response = null)
	{
		$allowed = $this->hasIdentity();
		$this->tranlate();
		if($allowed || is_null($allowed))
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
	
// 	protected function attachDefaultListeners()
// 	{
// 		$events = $this->getEventManager();
// 		$events->attach(MvcEvent::EVENT_DISPATCH, array($this, 'onDispatch'),2);
// 		$events->attach(MvcEvent::EVENT_DISPATCH_ERROR, array($this, 'onDispatchError'),10);
// 		$events->attach(MvcEvent::EVENT_FINISH, array($this, 'onFinish'));
// 		$events->attach(MvcEvent::EVENT_RENDER, array($this, 'onRender'));
// 		$events->attach(MvcEvent::EVENT_RENDER_ERROR, array($this, 'onRenderError'));
		
// 	}
	
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
		$this->layout('layout/noMenuLayout.tpl');
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
	protected function getAdapter()
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
	
	protected function setPaginator($total, $page, $method)
	{
		$paginatorAdapter = new Null($total);
		$paginator = new Paginator($paginatorAdapter);
		$paginator->setItemCountPerPage($this->maxPerPage);
		$paginator->setCurrentPageNumber($page);
		$paginator->setDefaultScrollingStyle("Sliding");
		
		$routeParams = $this->params()->fromRoute();
		$params = $this->params()->fromQuery();
		$idRoute = 0;
		if(isset($routeParams['id']))
			$idRoute = $routeParams['id'];
		$method = $this->getUnderscore($method);
		$regex = '/(\\\|::)/i';
		$replace = '/';
		$path = preg_replace($regex, $replace, $method);
		$regex = '/(-Action|-Controller\/|Controller)/i';
		$replace = '/';
		$path = preg_replace($regex, $replace, $path);
		$path = str_replace("///", "/", $path);
		$path = strtolower(substr($path, 0, -1));
	
		$this->view->path = $path;
		$this->view->paginator = $paginator->getPages();
		$this->view->params = $params;
		$this->view->idRoute = $idRoute;
	}
}
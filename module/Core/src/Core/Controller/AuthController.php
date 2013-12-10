<?php


namespace Core\Controller;
use BaseProject\Controller\BaseController;
use Zend\Authentication\AuthenticationService;
use BaseProject\Security\AuthStorage;
use Zend\Authentication\Adapter\DbTable\CredentialTreatmentAdapter;
use Core\Model\Bean\User;
use Core\Query\UserQuery;
use Query\Query;
use Zend\View\Model\ViewModel;
use BaseProject\Security\Acl;


class AuthController extends BaseController
{
	public function __construct()
	{
		$this->view  = new ViewModel();
		
	}
	
	protected  function hasIdentity()
	{
		$this->getAuthenticationService()->clearIdentity();
	}
	
	public function loginAction()
	{
		$this->layout("layout/noMenuLayout.tpl");
		return $this->view;
	}
	
	public function authAction()
	{
		try {
			$username = trim($this->params()->fromPost('username', 0));
			$password = trim($this->params()->fromPost('password', 0));
			
			if(!$username || !$password)
				throw new \Exception($this->i18n->translate('Please insert login ans password'));
				
			$authService = $this->getAuthenticationService();
			$authStorage = $this->getAuthStorage();
			$authAdapter = new CredentialTreatmentAdapter($this->getAdatper(), User::TABLENAME, User::USERNAME, User::PASSWORD, 'MD5(?)');
			$authAdapter->setCredential($password);
			$authAdapter->setIdentity($username);
			$authService->setAdapter($authAdapter);
			$authService->setStorage($authStorage);
			$result = $authService->authenticate();
			
			if($result->isValid())
			{
				if((int)$this->params()->fromPost('rememberMe') == 1)
				{
					$authStorage->setRememberMe(1);
					$authService->setStorage($authStorage);
					$userQuery = new UserQuery($this->getAdatper());
					$userQuery->whereAdd(User::USERNAME, $username);
					$userQuery->whereAdd(User::PASSWORD, $password, Query::EQUAL, Query::MD5);
					$user = $userQuery->findOne();
					$authService->getStorage()->write(array("user" => $user));
				}else{
					$userQuery = new UserQuery($this->getAdatper());
					$userQuery->whereAdd(User::USERNAME, $username);
					$userQuery->whereAdd(User::PASSWORD, $password, Query::EQUAL, Query::MD5);
					$authStorage->setRememberMe(1, 1200);
					$user = $userQuery->findOne();
					$authService->getStorage()->write(array("user" => $user));
				}
				
			}else{
				$messages = '';
				foreach ($result->getMessages() as $message)
					$messages .= $message."<br />";
				
				$messages = substr($messages, 0, -6);
				throw new \Exception($this->i18n->translate($messages));
			}
				
			
			$this->redirect()->toRoute(null,array('module' => 'core',  'controller'=>'index','action' => 'index',));
		} catch (\Exception $e) {
			$this->flashMessenger()->addErrorMessage($e->getMessage());
			$this->redirect()->toRoute(null,array('module' => 'core',  'controller'=>'auth','action' => 'login',));
		}
		return $this->view;
	}
}
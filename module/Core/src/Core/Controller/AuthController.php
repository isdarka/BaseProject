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
use Core\Model\Catalog\RoleLogCatalog;
use Core\Model\Catalog\UserLogCatalog;
use Core\Model\Factory\UserLogFactory;
use Core\Model\Bean\UserLog;
use Model\Bean\AbstractBean;
use Core\Model\Bean\Person;


class AuthController extends BaseController
{
	public function __construct()
	{
		$this->view  = new ViewModel();
		
	}
	
	protected  function hasIdentity()
	{
		if($this->getAuthenticationService()->hasIdentity())
			$this->newLog($this->getUser(), UserLog::LOGOUT);
		$this->getAuthenticationService()->clearIdentity();
	}
	
	public function loginAction()
	{
// 		$person = new Person();
// 		var_dump($person);
// 		$user = new User();
// 		var_dump($user);
// 		$userQuery = new UserQuery($this->getAdapter());
// 		$users = $userQuery->whereAdd(User::NAME, "demo")->find();
// 		var_dump($users);
// 		die();
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
			$authAdapter = new CredentialTreatmentAdapter($this->getAdapter(), User::TABLENAME, User::USERNAME, User::PASSWORD, 'MD5(?)');
			$authAdapter->setCredential($password);
			$authAdapter->setIdentity($username);
			$authService->setAdapter($authAdapter);
			$authService->setStorage($authStorage);
			$result = $authService->authenticate();
			
			$userQuery = new UserQuery($this->getAdapter());
			$userQuery->whereAdd(User::USERNAME, $username);
			
			
			if($result->isValid())
			{
				$userQuery->whereAdd(User::PASSWORD, $password, Query::EQUAL, Query::MD5);
				$user = $userQuery->findOne();
				$this->newLog($user, UserLog::LOGIN);
				if((int)$this->params()->fromPost('rememberMe') == 1)
				{
					$authStorage->setRememberMe(1);
					$authService->setStorage($authStorage);
					$acl = new Acl($this->getAdapter(), $user);
					$acl->removeAll();
					$acl->flushPrivileges();
					$authService->getStorage()->write(array("user" => $user, "acl" => $acl->getAcl()));
				}else{
					$authStorage->setRememberMe(1, 1200);
					$acl = new Acl($this->getAdapter(), $user);
					$acl->removeAll();
					$acl->flushPrivileges();
					$authService->getStorage()->write(array("user" => $user, "acl" => $acl->getAcl()));
				}
				
			}else{
				if($user instanceof User)
					$this->newLog($user, UserLog::FAILED_LOGIN);
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
	
	/**
	 *
	 * Log
	 *
	 */
	private function newLog(AbstractBean $bean, $event, $note = "" )
	{
		$userLogCatalog = new UserLogCatalog($this->getAdapter());
		$date = new \DateTime("now");
		$userLog = UserLogFactory::createFromArray(array(
				UserLog::ID_USER => $bean->getIdUser(),
				UserLog::EVENT => $event,
				UserLog::NOTE => $note,
				UserLog::TIMESTAMP => $date->format(\DateTime::W3C),
		)
		);
		$userLogCatalog->save($userLog);
	}
}
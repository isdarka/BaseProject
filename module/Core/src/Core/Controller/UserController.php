<?php


namespace Core\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use BaseProject\Controller\BaseController;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Form\Annotation\Object;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Sql\Where;
use Zend\Db\Sql\Predicate\PredicateSet;
use Zend\Db\Adapter\Platform\PlatformInterface;
use Zend\Db\Sql\Platform\Mysql\Mysql;
use Zend\Db\Metadata\Metadata;
use Zend\Db\Adapter\Adapter;
use Core\Model\Metadata\PersonMetadata;
use Zend\Db\Sql\Predicate\Predicate;
use Zend\Db\Sql\Expression;
use Query\Query;
use Core\Model\Catalog\ModuleCatalog;
use Core\Model\Bean\ModuleBean;
use Core\Query\ModuleQuery;
use Core\Module;
use Zend\Mail\Message;
use Zend\Mail\Transport\Sendmail;
use Core\Model\Bean\User;
use Core\Model\Factory\UserFactory;
use Core\Model\Catalog\UserCatalog;
use Core\Query\UserQuery;
use Model\Bean\AbstractBean;
use Core\Model\Catalog\UserLogCatalog;
use Core\Model\Factory\UserLogFactory;
use Core\Model\Bean\UserLog;
use Core\Model\Bean\Log;
use Core\Query\UserLogQuery;
use Zend\View\Model\JsonModel;
use Zend\Paginator\Paginator;
use Zend\View\Helper\PaginationControl;
use Zend\Paginator\Adapter\DbTableGateway;
use Core\Query\RoleQuery;
use Core\Model\Bean\Role;




class UserController extends BaseController
{
	public function indexAction()
	{
		$userQuery = new UserQuery($this->getAdapter());
		$roleQuery = new RoleQuery($this->getAdapter());
		$total = $userQuery->count();
		$maxPerPage = 5;
		$page = $this->params()->fromRoute("page", 1);
		$users = $userQuery->limit($maxPerPage)->offset(($page -1) * $maxPerPage)->find();
		$roles = $roleQuery->find();
		$this->view->users = $users;
		$this->view->roles = $roles;
		$this->view->pages = ceil($total / $maxPerPage);
		$this->view->currentPage = $page;
		$this->view->total = $total;
		return $this->view;
	}
	
	public function createAction()
	{
		$user = new User();
		$this->view->user = $user;
		
		$roleQuery = new RoleQuery($this->getAdapter());
		$roleCollection = $roleQuery->whereAdd(Role::STATUS, Role::ENABLE)->find();
		$this->view->setTemplate("core/user/form.tpl");
		$this->view->roleCollection = $roleCollection;
		return $this->view;
	}
	
	public function saveAction()
	{
		$idUser = $this->params()->fromPost("idUser", 0);
		
		if($idUser)
		{
			$userQuery = new UserQuery($this->getAdapter());
			$user = $userQuery->findByPkOrThrow($idUser, $this->i18n->translate("User not found."));
		}else 
			$user = new User();
		
		$userCatalog = new UserCatalog($this->getAdapter());
		$userCatalog->beginTransaction();
		try {
			UserFactory::populate($user, $this->params()->fromPost());
			$user->setPassword(md5($user->getPassword()));
			$userCatalog->save($user);
			($idUser)?$this->newLog($user, Log::UPDATED):$this->newLog($user, Log::CREATED);
			$userCatalog->commit();
			$this->flashMessenger()->addSuccessMessage('User Saved.');
		} catch (Exception $e) {
			$this->flashMessenger()->addErrorMessage($e->getMessage());
			$userCatalog->rollback();
		}
		 $this->redirect()->toRoute(null,array('controller'=>"user",'action' => "index",));
		 return $this->view;
	}
	
	public function updateAction()
	{
		try {
			$idUser = $this->params()->fromRoute("id", 0);
			if(!$idUser)
				throw new \Exception($this->i18n->translate('User not defined.'));
			
			$userQuery = new UserQuery($this->getAdapter());
			$user = $userQuery->findByPkOrThrow($idUser, $this->i18n->translate("User not found."));
			$roleQuery = new RoleQuery($this->getAdapter());
			$roleCollection = $roleQuery->whereAdd(Role::STATUS, Role::ENABLE)->find();
			$this->view->roleCollection = $roleCollection;
			$this->view->user = $user;
			$this->view->setTemplate("core/user/form.tpl");
			return $this->view;
		} catch (\Exception $e) {
			$this->flashMessenger()->addErrorMessage($e->getMessage());
			$this->redirect()->toRoute(null, array(
					'controller' => 'user',
					'action' =>  'index',
			));
		}
	}
	
	public function enableAction()
	{
		$userCatalog = new UserCatalog($this->getAdapter());
		$userCatalog->beginTransaction();
		try {
			$idUser = $this->params()->fromRoute("id", 0);
			if(!$idUser)
				throw new \Exception($this->i18n("User not defined."));
			$userQuery = new UserQuery($this->getAdapter());
			$user = $userQuery->findByPkOrThrow($idUser, $this->i18n->translate("User not found."));
			$user->setStatus(User::ENABLE);			
			$userCatalog->save($user);
			$this->newLog($user, Log::ENABLED);
			$userCatalog->commit();
			$this->flashMessenger()->addSuccessMessage('User has been enabled.');
		} catch (Exception $e) {
			$this->flashMessenger()->addErrorMessage($e->getMessage());
			$userCatalog->rollback();
		}
		$this->redirect()->toRoute(null,array('controller'=>"user",'action' => "index",));
		return $this->view;
	}
	
	public function disableAction()
	{
		$userCatalog = new UserCatalog($this->getAdapter());
		$userCatalog->beginTransaction();
		try {
			$idUser = $this->params()->fromRoute("id", 0);
			if(!$idUser)
				throw new \Exception($this->i18n("User not defined."));
			$userQuery = new UserQuery($this->getAdapter());
			$user = $userQuery->findByPkOrThrow($idUser, $this->i18n->translate("User not found."));
			$user->setStatus(User::DISABLE);
			$userCatalog->save($user);
			$this->newLog($user, Log::DISABLED);
			$userCatalog->commit();
			$this->flashMessenger()->addSuccessMessage('User has been disabled.');
		} catch (\Exception $e) {
			$this->flashMessenger()->addErrorMessage($e->getMessage());
			$userCatalog->rollback();
		}
		$this->redirect()->toRoute(null,array('controller'=>"user",'action' => "index",));
		return $this->view;
	}

	private function newLog(AbstractBean $bean, $event, $note = "")
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
	
	
	public function historyAction()
	{
		try {
			$idUser = $this->params()->fromRoute("id", 0);
			$page = $this->params()->fromRoute("page", 1);
			if(!$idUser )
				throw new \Exception($this->i18n("User not defined."));
			$userQuery = new UserQuery($this->getAdapter());
			$users = $userQuery->find();
			$userQuery = new UserQuery($this->getAdapter());
			$user = $userQuery->findByPkOrThrow($idUser, $this->i18n->translate("User not found."));
			$userLogQuery = new UserLogQuery($this->getAdapter());
			$userLogQuery->whereAdd("UserLog." . UserLog::ID_USER, $user->getIdUser());
// 			var_dump($userLogQuery->toSql());
// 			die("a");
			$total = $userLogQuery->count();
			$userLogQuery->addDescendingOrderBy(UserLog::ID_USER_LOG );
			$userLogQuery->limit($this->maxPerPage)->offset(($page -1) * $this->maxPerPage);
			$userLogs = $userLogQuery->find();
			$userQuery = new UserQuery($this->getAdapter());
			$users = $userQuery->find();
			$this->setPaginator($total, $page, __METHOD__);
	
			//Views
			$this->view->userLogs = $userLogs;
			$this->view->users = $users;
			$this->view->users = $users;
		} catch (\Exception $e) {
			$this->flashMessenger()->addErrorMessage($e->getMessage());
			$this->redirect()->toRoute(null,array('controller'=>'user','action' => 'index',));
		}
		return $this->view;
	}
	
// 	public function historyAction()
// 	{
// 		try {
// 			$idUser = $this->params()->fromRoute("id", 0);
// 			if(!$idUser)
// 				throw new \Exception($this->i18n("User not defined."));
// 			$userQuery = new UserQuery($this->getAdapter());
// 			$user = $userQuery->findByPkOrThrow($idUser, $this->i18n->translate("User not found."));

// 			$userLogQuery = new UserLogQuery($this->getAdapter());
// 			$userLogQuery->whereAdd(UserLog::ID_USER, $user->getIdUser());
// 			$userLogQuery->addDescendingOrderBy(UserLog::ID_USER_LOG);
// 			$userLogs = $userLogQuery->find();
// 			die();
// 			$userQuery = new UserQuery($this->getAdapter());
// 			$users = $userQuery->find();
// 			$this->view->userLogs = $userLogs;
// 			$this->view->users = $users;
// 		} catch (\Exception $e) {
// 			$this->flashMessenger()->addErrorMessage($e->getMessage());
// 			$this->redirect()->toRoute(null,array('controller'=>"user",'action' => "index",));
// 		}
		
// 		return $this->view;
// 	}
	
	public function searchAction()
	{
		$jsonModel = new JsonModel(array(
				"demo" => "1",
				"demo1" => "11",
				"demo2" => "12",
		));
		return  $jsonModel;
	}
}
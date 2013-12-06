<?php


namespace Core\Controller;


use Core\Query\RoleQuery;
use BaseProject\Controller\BaseController;
use Core\Model\Bean\Role;
use Core\Model\Catalog\RoleCatalog;
use Core\Model\Factory\RoleFactory;
use Core\Model\Bean\Log;
use Model\Bean\AbstractBean;
class RoleController extends BaseController
{
	public function indexAction()
	{
		$roleQuery = new RoleQuery($this->getAdatper());
		$total = $roleQuery->count();		
		$page = $this->params()->fromRoute("page", 1);
		$roles = $roleQuery->limit($this->maxPerPage)->offset(($page -1) * $this->maxPerPage)->find();
		
		
		$this->view->roles = $roles;
		$this->view->pages = ceil($total / $this->maxPerPage);
		$this->view->currentPage = $page;
		$this->view->total = $total;
		return $this->view;
	}
	
	public function createAction()
	{
		$role = new Role();
		$this->view->role = $role;
		
		$this->view->setTemplate("core/role/form.tpl");
		return $this->view;
	}
	
	public function saveAction()
	{
		$idRole = $this->params()->fromPost("idRole", 0);
		if($idRole)
		{
			$roleQuery = new RoleQuery($this->getAdatper());
			$role = $roleQuery->findByPkOrThrow($idRole, $this->i18n->translate("Role not found."));
		}else{
			$role = new Role();
			$role->setStatus(Role::ENABLE);			
		}
		
		$roleCatalog = new RoleCatalog($this->getAdatper());
		$roleCatalog->beginTransaction();
		try {
			RoleFactory::populate($role, $this->params()->fromPost());
			$roleCatalog->save($role);
			($idRole)?$this->newLog($role, Log::UPDATED):$this->newLog($role, Log::CREATED);
			$roleCatalog->commit();
			$this->flashMessenger()->addSuccessMessage('Role Saved.');
		} catch (\Exception $e) {
			$this->flashMessenger()->addErrorMessage($e->getMessage());
			$roleCatalog->rollback();
		}
		 $this->redirect()->toRoute(null,array('controller'=>"role",'action' => "index",));
		 return $this->view;
	}
	
	public function updateAction()
	{
		try {
			$idUser = $this->params()->fromRoute("id", 0);
			if(!$idUser)
				throw new \Exception($this->i18n->translate('User not defined.'));
			
			$userQuery = new UserQuery($this->getAdatper());
			$user = $userQuery->findByPkOrThrow($idUser, $this->i18n->translate("User not found."));
			
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
		$userCatalog = new UserCatalog($this->getAdatper());
		$userCatalog->beginTransaction();
		try {
			$idUser = $this->params()->fromRoute("id", 0);
			if(!$idUser)
				throw new \Exception($this->i18n("User not defined."));
			$userQuery = new UserQuery($this->getAdatper());
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
		$userCatalog = new UserCatalog($this->getAdatper());
		$userCatalog->beginTransaction();
		try {
			$idUser = $this->params()->fromRoute("id", 0);
			if(!$idUser)
				throw new \Exception($this->i18n("User not defined."));
			$userQuery = new UserQuery($this->getAdatper());
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
// 		$userLogCatalog = new UserLogCatalog($this->getAdatper());
// 		$date = new \DateTime("now");
// 		$userLog = UserLogFactory::createFromArray(array(
// 				UserLog::ID_USER => $bean->getIdUser(),
// 				UserLog::EVENT => $event,
// 				UserLog::NOTE => $note,
// 				UserLog::TIMESTAMP => $date->format(\DateTime::W3C),
// 				)
// 		);
		
// 		$userLogCatalog->save($userLog);
	}
	
	public function historyAction()
	{
		try {
			$idUser = $this->params()->fromRoute("id", 0);
			if(!$idUser)
				throw new \Exception($this->i18n("User not defined."));
			$userQuery = new UserQuery($this->getAdatper());
			$user = $userQuery->findByPkOrThrow($idUser, $this->i18n->translate("User not found."));

			$userLogQuery = new UserLogQuery($this->getAdatper());
			$userLogQuery->whereAdd(UserLog::ID_USER, $user->getIdUser());
			$userLogQuery->addDescendingOrderBy(UserLog::ID_USER_LOG);
			$userLogs = $userLogQuery->find();
			
			$userQuery = new UserQuery($this->getAdatper());
			$users = $userQuery->find();
			$this->view->userLogs = $userLogs;
			$this->view->users = $users;
		} catch (\Exception $e) {
			$this->flashMessenger()->addErrorMessage($e->getMessage());
			$this->redirect()->toRoute(null,array('controller'=>"user",'action' => "index",));
		}
		
		return $this->view;
	}
	
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
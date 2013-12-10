<?php

/**
 *
 * RoleController
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Controller
 * @copyright 
 * @license 
 * @created Mon Dec 9 11:15:21 2013
 * @version 1.0
 */

namespace Core\Controller;

use BaseProject\Controller\BaseController;
use Core\Query\RoleQuery;
use Core\Model\Bean\Role;
use Core\Model\Catalog\RoleCatalog;
use Core\Model\Factory\RoleFactory;
use Model\Bean\AbstractBean;
use Core\Model\Bean\Log;
use Core\Query\RoleLogQuery;
use Core\Model\Bean\RoleLog;
use Core\Model\Catalog\RoleLogCatalog;
use Core\Model\Factory\RoleLogFactory;
use Core\Query\UserQuery;

class RoleController extends BaseController
{

		
 	/**
 	 *
 	 * Index
 	 *
 	 */
	public function indexAction() 
	{
		$roleQuery = new RoleQuery($this->getAdatper());
		$total = $roleQuery->count();
		$page = $this->params()->fromRoute("page", 1);
		$roleQuery->limit($this->maxPerPage)->offset(($page -1) * $this->maxPerPage)->find();
		$roles = $roleQuery->find();

		//Views
		$this->view->roles = $roles;
		$this->view->pages = ceil($total / $this->maxPerPage);
		$this->view->currentPage = $page;
		$this->view->total = $total;
		return $this->view;
	}
		
 	/**
 	 *
 	 * Create
 	 *
 	 */
	public function createAction() 
	{
		$role = new Role();
		$this->view->role = $role;
		
		//Views
		$this->view->setTemplate("core/role/form.tpl");
		return $this->view;
	}
		
 	/**
 	 *
 	 * update
 	 *
 	 */
	public function updateAction() 
	{
		try {
			$idRole = $this->params()->fromRoute("id", 0);
			if(!$idRole)
				throw new \Exception($this->i18n->translate('Role not defined.'));
		
			$roleQuery = new RoleQuery($this->getAdatper());
			$role = $roleQuery->findByPkOrThrow($idRole, $this->i18n->translate("Role not found."));
		
			//Views
			$this->view->role = $role;
			$this->view->setTemplate("core/role/form.tpl");
			return $this->view;
		} catch (\Exception $e) {
			$this->flashMessenger()->addErrorMessage($e->getMessage());
			$this->redirect()->toRoute(null, array(
				'controller' => 'role ',
				'action' =>  'index',
			));
		}
		//Views
		$this->view->setTemplate("core/role/form.tpl");
		return $this->view;
	}
		
 	/**
 	 *
 	 * Save
 	 *
 	 */
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
		$this->redirect()->toRoute(null,array('controller'=>'role','action' => 'index',));
		return $this->view;
	}
		
 	/**
 	 *
 	 * Enable
 	 *
 	 */
	public function enableAction() 
	{
		$roleCatalog = new RoleCatalog($this->getAdatper());
		$roleCatalog->beginTransaction();
		try {
			$idRole = $this->params()->fromRoute("id", 0);
			if(!$idRole)
				throw new \Exception($this->i18n("Role not defined."));
			$roleQuery = new RoleQuery($this->getAdatper());
			$role = $roleQuery->findByPkOrThrow($idRole, $this->i18n->translate("Role not found."));
			$role->setStatus(Role::ENABLE);
			$roleCatalog->save($role);
			$this->newLog($role, Role::ENABLE);
			$roleCatalog->commit();
			$this->flashMessenger()->addSuccessMessage('Role has been enabled.');
		} catch (\Exception $e) {
			$this->flashMessenger()->addErrorMessage($e->getMessage());
			$roleCatalog->rollback();
		}
		$this->redirect()->toRoute(null,array('controller'=>'role','action' => 'index',));
		return $this->view;
	}
		
 	/**
 	 *
 	 * Disable
 	 *
 	 */
	public function disableAction() 
	{
		$roleCatalog = new RoleCatalog($this->getAdatper());
		$roleCatalog->beginTransaction();
		try {
			$idRole = $this->params()->fromRoute("id", 0);
			if(!$idRole)
				throw new \Exception($this->i18n("Role not defined."));
			$roleQuery = new RoleQuery($this->getAdatper());
			$role = $roleQuery->findByPkOrThrow($idRole, $this->i18n->translate("Role not found."));
			$role->setStatus(Role::DISABLE);
			$roleCatalog->save($role);
			$this->newLog($role, Role::DISABLE);
			$roleCatalog->commit();
			$this->flashMessenger()->addSuccessMessage('Role has been disabled.');
		} catch (\Exception $e) {
			$this->flashMessenger()->addErrorMessage($e->getMessage());
			$roleCatalog->rollback();
		}
		$this->redirect()->toRoute(null,array('controller'=>'role','action' => 'index',));
		return $this->view;
	}
		
 	/**
 	 *
 	 * History
 	 *
 	 */
	public function historyAction() 
	{
		try {
			$idRole = $this->params()->fromRoute("id", 0);
			if(!$idRole )
				throw new \Exception($this->i18n("Role not defined."));
			$userQuery = new UserQuery($this->getAdatper());
			$users = $userQuery->find();
			$roleQuery = new RoleQuery($this->getAdatper());
			$role = $roleQuery->findByPkOrThrow($idRole, $this->i18n->translate("Role not found."));
			$roleLogQuery = new RoleLogQuery($this->getAdatper());
			$roleLogQuery->whereAdd(RoleLog::ID_ROLE, $role->getIdRole());
			$roleLogQuery->addDescendingOrderBy(RoleLog::ID_ROLE_LOG );
			$roleLogs = $roleLogQuery->find();
			$roleQuery = new RoleQuery($this->getAdatper());
			$roles = $roleQuery->find();
		
			 //Views
			$this->view->roleLogs = $roleLogs;
			$this->view->roles = $roles;
			$this->view->users = $users;
		} catch (\Exception $e) {
			$this->flashMessenger()->addErrorMessage($e->getMessage());
			$this->redirect()->toRoute(null,array('controller'=>'role','action' => 'index',));
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
		$roleLogCatalog = new RoleLogCatalog($this->getAdatper());
		$date = new \DateTime("now");
		$roleLog = RoleLogFactory::createFromArray(array(
			RoleLog::ID_ROLE => $bean->getIdRole(),
			RoleLog::ID_USER => $this->getUser()->getIdUser(),
			RoleLog::EVENT => $event,
			RoleLog::NOTE => $note,
			RoleLog::TIMESTAMP => $date->format(\DateTime::W3C),
			)
		);
		$roleLogCatalog->save($roleLog);
	}
}
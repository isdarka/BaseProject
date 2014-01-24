<?php

/**
 *
 * MenuItemController
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
use Core\Query\MenuItemQuery;
use Core\Model\Bean\MenuItem;
use Core\Model\Catalog\MenuItemCatalog;
use Core\Model\Factory\MenuItemFactory;
use Model\Bean\AbstractBean;
use Core\Model\Bean\Log;
use Core\Query\MenuItemLogQuery;
use Core\Model\Bean\MenuItemLog;
use Core\Model\Catalog\MenuItemLogCatalog;
use Core\Model\Factory\MenuItemLogFactory;
use Core\Query\UserQuery;
use Core\Query\ActionQuery;
use Core\Query\ControllerQuery;
use Core\Model\Bean\Controller;

class MenuItemController extends BaseController
{

		
 	/**
 	 *
 	 * Index
 	 *
 	 */
	public function indexAction() 
	{
		$queryParams = $this->params()->fromQuery();
		$menuItemQuery = new MenuItemQuery($this->getAdapter());
		$menuItemQuery->filter($queryParams);
		$total = $menuItemQuery->count();
		$page = $this->params()->fromRoute("page", 1);
		$menuItems = $menuItemQuery->limit($this->maxPerPage)->offset(($page -1) * $this->maxPerPage)->find();
		$this->setPaginator($total, $page, __METHOD__);
		
		//Views
		$this->view->menuItems = $menuItems;
		$this->view->pages = ceil($total / $this->maxPerPage);
		$this->view->currentPage = $page;
		$this->view->total = $total;
		$this->view->queryParams = $queryParams;
		$this->view->statuses = MenuItem::$statuses;
		return $this->view;
	}
		
 	/**
 	 *
 	 * Create
 	 *
 	 */
	public function createAction() 
	{
		$menuItem = new MenuItem();
		$this->view->menuItem = $menuItem;
		
		$menuParentQuery = new MenuItemQuery($this->getAdapter());
		$menuParentQuery->whereAdd(MenuItem::ID_PARENT, null, MenuItemQuery::IS_NULL);
		$menuParents = $menuParentQuery->find();
		$actionQuery = new ActionQuery($this->getAdapter());
		$actions = $actionQuery->find();
		
		$controllerQuery = new ControllerQuery($this->getAdapter());
		$controllerQuery->whereAdd(Controller::ID_CONTROLLER, $actions->getControllerIds(), ControllerQuery::IN);
		$controllers = $controllerQuery->find();
		$comboControllersActions = array();
		foreach ($controllers as $controller)
		{
			/* @var $controller Controller */
			$actionsController = $actions->getByIdController($controller->getIdController());
			$comboControllersActions[$controller->getName()] = $actionsController->toCombo();
		}
		//Views
		$this->view->menuParents = $menuParents;
		$this->view->comboControllersActions = $comboControllersActions;
		$this->view->setTemplate("core/menu-item/form.tpl");
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
			$idMenuItem = $this->params()->fromRoute("id", 0);
			if(!$idMenuItem)
				throw new \Exception($this->i18n->translate('MenuItem not defined.'));
		
			$menuItemQuery = new MenuItemQuery($this->getAdapter());
			$menuItem = $menuItemQuery->findByPkOrThrow($idMenuItem, $this->i18n->translate("MenuItem not found."));
		
			$menuParentQuery = new MenuItemQuery($this->getAdapter());
			$menuParentQuery->whereAdd(MenuItem::ID_PARENT, null, MenuItemQuery::IS_NULL);
			$menuParents = $menuParentQuery->find();
			
			$actionQuery = new ActionQuery($this->getAdapter());
			$actions = $actionQuery->find();
			
			$controllerQuery = new ControllerQuery($this->getAdapter());
			$controllerQuery->whereAdd(Controller::ID_CONTROLLER, $actions->getControllerIds(), ControllerQuery::IN);
			
			$controllers = $controllerQuery->find();
			$comboControllersActions = array();
			foreach ($controllers as $controller)
			{
				/* @var $controller Controller */
				$actionsController = $actions->getByIdController($controller->getIdController());
				$comboControllersActions[$controller->getName()] = $actionsController->toCombo();
			}
			
			//Views
			$this->view->menuParents = $menuParents;
			$this->view->comboControllersActions = $comboControllersActions;
			//Views
			$this->view->menuItem = $menuItem;
			
		} catch (\Exception $e) {
			$this->flashMessenger()->addErrorMessage($e->getMessage());
			$this->redirect()->toRoute(null, array(
				'controller' => 'menu-item ',
				'action' =>  'index',
			));
		}
		//Views
		$this->view->setTemplate("core/menu-item/form.tpl");
		return $this->view;
	}
		
 	/**
 	 *
 	 * Save
 	 *
 	 */
	public function saveAction() 
	{
		$idMenuItem = $this->params()->fromPost("idMenuItem", 0);
		if($idMenuItem)
		{
			$menuItemQuery = new MenuItemQuery($this->getAdapter());
			$menuItem = $menuItemQuery->findByPkOrThrow($idMenuItem, $this->i18n->translate("MenuItem not found."));
		}else{
			$menuItem = new MenuItem();
			$menuItem->setStatus(MenuItem::ENABLE);
		}
		
		$menuItemCatalog = new MenuItemCatalog($this->getAdapter());
		$menuItemCatalog->beginTransaction();
		try {
			MenuItemFactory::populate($menuItem, $this->params()->fromPost());
			if(!$menuItem->getIdAction())
				$menuItem->setIdAction(NULL);
			if(!$menuItem->getIdParent())
				$menuItem->setIdParent(NULL);
			$menuItemCatalog->save($menuItem);
			($idMenuItem)?$this->newLog($menuItem, Log::UPDATED):$this->newLog($menuItem, Log::CREATED);
			$menuItemCatalog->commit();
			$this->flashMessenger()->addSuccessMessage('MenuItem Saved.');
		} catch (\Exception $e) {
			$this->flashMessenger()->addErrorMessage($e->getMessage());
			$menuItemCatalog->rollback();
		}
		$this->redirect()->toRoute(null,array('controller'=>'menu-item','action' => 'index',));
		return $this->view;
	}
		
 	/**
 	 *
 	 * Enable
 	 *
 	 */
	public function enableAction() 
	{
		$menuItemCatalog = new MenuItemCatalog($this->getAdapter());
		$menuItemCatalog->beginTransaction();
		try {
			$idMenuItem = $this->params()->fromRoute("id", 0);
			if(!$idMenuItem)
				throw new \Exception($this->i18n("MenuItem not defined."));
			$menuItemQuery = new MenuItemQuery($this->getAdapter());
			$menuItem = $menuItemQuery->findByPkOrThrow($idMenuItem, $this->i18n->translate("MenuItem not found."));
			$menuItem->setStatus(MenuItem::ENABLE);
			$menuItemCatalog->save($menuItem);
			$this->newLog($menuItem, MenuItem::ENABLE);
			$menuItemCatalog->commit();
			$this->flashMessenger()->addSuccessMessage('MenuItem has been enabled.');
		} catch (\Exception $e) {
			$this->flashMessenger()->addErrorMessage($e->getMessage());
			$menuItemCatalog->rollback();
		}
		$this->redirect()->toRoute(null,array('controller'=>'menuitem','action' => 'index',));
		return $this->view;
	}
		
 	/**
 	 *
 	 * Disable
 	 *
 	 */
	public function disableAction() 
	{
		$menuItemCatalog = new MenuItemCatalog($this->getAdapter());
		$menuItemCatalog->beginTransaction();
		try {
			$idMenuItem = $this->params()->fromRoute("id", 0);
			if(!$idMenuItem)
				throw new \Exception($this->i18n("MenuItem not defined."));
			$menuItemQuery = new MenuItemQuery($this->getAdapter());
			$menuItem = $menuItemQuery->findByPkOrThrow($idMenuItem, $this->i18n->translate("MenuItem not found."));
			$menuItem->setStatus(MenuItem::DISABLE);
			$menuItemCatalog->save($menuItem);
			$this->newLog($menuItem, MenuItem::DISABLE);
			$menuItemCatalog->commit();
			$this->flashMessenger()->addSuccessMessage('MenuItem has been disabled.');
		} catch (\Exception $e) {
			$this->flashMessenger()->addErrorMessage($e->getMessage());
			$menuItemCatalog->rollback();
		}
		$this->redirect()->toRoute(null,array('controller'=>'menu-item','action' => 'index',));
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
			$idMenuItem = $this->params()->fromRoute("id", 0);
			if(!$idMenuItem )
				throw new \Exception($this->i18n("MenuItem not defined."));
			$userQuery = new UserQuery($this->getAdapter());
			$users = $userQuery->find();
			$menuItemQuery = new MenuItemQuery($this->getAdapter());
			$menuItem = $menuItemQuery->findByPkOrThrow($idMenuItem, $this->i18n->translate("MenuItem not found."));
			$menuItemLogQuery = new MenuItemLogQuery($this->getAdapter());
			$menuItemLogQuery->whereAdd(MenuItemLog::ID_MENU_ITEM, $menuItem->getIdMenuItem());
			$menuItemLogQuery->addDescendingOrderBy(MenuItemLog::ID_MENU_ITEM_LOG );
			$menuItemLogs = $menuItemLogQuery->find();
			$menuItemQuery = new MenuItemQuery($this->getAdapter());
			$menuItems = $menuItemQuery->find();
		
			 //Views
			$this->view->menuItemLogs = $menuItemLogs;
			$this->view->menuItems = $menuItems;
			$this->view->users = $users;
		} catch (\Exception $e) {
			$this->flashMessenger()->addErrorMessage($e->getMessage());
			$this->redirect()->toRoute(null,array('controller'=>'menu-item','action' => 'index',));
		}
		return $this->view;
	}
		
 	/**
 	 *
 	 * Log
 	 *
 	 */
	private function newLog( AbstractBean $bean, $event, $note = "") 
	{
		$menuItemLogCatalog = new MenuItemLogCatalog($this->getAdapter());
		$date = new \DateTime("now");
		$menuItemLog = MenuItemLogFactory::createFromArray(array(
			MenuItemLog::ID_MENU_ITEM => $bean->getIdMenuItem(),
			MenuItemLog::ID_USER => $this->getUser()->getIdUser(),
			MenuItemLog::EVENT => $event,
			MenuItemLog::NOTE => $note,
			MenuItemLog::TIMESTAMP => $date->format(\DateTime::W3C),
			)
		);
		$menuItemLogCatalog->save($menuItemLog);
	}
}
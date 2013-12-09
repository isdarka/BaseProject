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
 * @created Sun Dec 8 22:25:31 2013
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
use core\Query\MenuItemLogQuery;
use core\Model\Bean\MenuItemLog;
use core\Model\Catalog\MenuItemLogCatalog;
use core\Model\Factory\MenuItemLogFactory;
use Core\Query\UserQuery;

class MenuItemController extends BaseController
{

		
 	/**
 	 *
 	 * Index
 	 *
 	 */
	public function indexAction() 
	{
		$menuItemQuery = new MenuItemQuery($this->getAdatper());
		$total = $menuItemQuery->count();
		$page = $this->params()->fromRoute("page", 1);
		$menuItems = $menuItemQuery->limit($this->maxPerPage)->offset(($page -1) * $this->maxPerPage)->find();
		
		//Views
		$this->view->menuItems = $menuItems;
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
		$menuItem = new MenuItem();
		$this->view->menuItem = $menuItem;
		
		//Views
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
		
			$menuItemQuery = new MenuItemQuery($this->getAdatper());
			$menuItem = $menuItemQuery->findByPkOrThrow($idMenuItem, $this->i18n->translate("MenuItem not found."));
		
			//Views
			$this->view->menuItem = $menuItem;
			$this->view->setTemplate("core/menu-item/form.tpl");
			return $this->view;
		} catch (\Exception $e) {
			$this->flashMessenger()->addErrorMessage($e->getMessage());
			$this->redirect()->toRoute(null, array(
				'controller' => 'menuitem ',
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
			$menuItemQuery = new MenuItemQuery($this->getAdatper());
			$menuItem = $menuItemQuery->findByPkOrThrow($idMenuItem, $this->i18n->translate("MenuItem not found."));
		}else{
			$menuItem = new MenuItem();
			$menuItem->setStatus(MenuItem::ENABLE);
		}
		
		$menuItemCatalog = new MenuItemCatalog($this->getAdatper());
		$menuItemCatalog->beginTransaction();
		try {
			MenuItemFactory::populate($menuItem, $this->params()->fromPost());
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
		$menuItemCatalog = new MenuItemCatalog($this->getAdatper());
		$menuItemCatalog->beginTransaction();
		try {
			$idMenuItem = $this->params()->fromRoute("id", 0);
			if(!$idMenuItem)
				throw new \Exception($this->i18n("MenuItem not defined."));
			$menuItemQuery = new MenuItemQuery($this->getAdatper());
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
		$this->redirect()->toRoute(null,array('controller'=>'menu-item','action' => 'index',));
		return $this->view;
	}
		
 	/**
 	 *
 	 * Disable
 	 *
 	 */
	public function disableAction() 
	{
		$menuItemCatalog = new MenuItemCatalog($this->getAdatper());
		$menuItemCatalog->beginTransaction();
		try {
			$idMenuItem = $this->params()->fromRoute("id", 0);
			if(!$idMenuItem)
				throw new \Exception($this->i18n("MenuItem not defined."));
			$menuItemQuery = new MenuItemQuery($this->getAdatper());
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
			$userQuery = new UserQuery($this->getAdatper());
			$users = $userQuery->find();
			$menuItemQuery = new MenuItemQuery($this->getAdatper());
			$menuItem = $menuItemQuery->findByPkOrThrow($idMenuItem, $this->i18n->translate("MenuItem not found."));
			$menuItemLogQuery = new MenuItemLogQuery($this->getAdatper());
			$menuItemLogQuery->whereAdd(MenuItemLog::ID_MENU_ITEM, $menuItem->getIdMenuItem());
			$menuItemLogQuery->addDescendingOrderBy(MenuItemLog::ID_MENU_ITEM_LOG );
			$menuItemLogs = $menuItemLogQuery->find();
			$menuItemQuery = new MenuItemQuery($this->getAdatper());
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
	private function newLog($event, $note = "", AbstractBean $bean) 
	{
		$menuItemLogCatalog = new MenuItemLogCatalog($this->getAdatper());
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
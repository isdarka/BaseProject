<?php

/**
 *
 * NotificationTypeController
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Controller
 * @copyright 
 * @license 
 * @created Fri Jan 31 09:52:48 2014
 * @version 1.0
 */

namespace Core\Controller;

use BaseProject\Controller\BaseController;
use Core\Query\NotificationTypeQuery;
use Core\Model\Bean\NotificationType;
use Core\Model\Catalog\NotificationTypeCatalog;
use Core\Model\Factory\NotificationTypeFactory;
use Model\Bean\AbstractBean;
use Core\Model\Bean\Log;
use Core\Query\UserQuery;

class NotificationTypeController extends BaseController
{

		
 	/**
 	 *
 	 * Index
 	 *
 	 */
	public function indexAction() 
	{
		$queryParams = $this->params()->fromQuery();
		$notificationTypeQuery = new NotificationTypeQuery($this->getAdapter());
		$notificationTypeQuery->filter($queryParams);
		$total = $notificationTypeQuery->count();
		$page = $this->params()->fromRoute("page", 1);
		$notificationTypes = $notificationTypeQuery->limit($this->maxPerPage)->offset(($page -1) * $this->maxPerPage)->find();
		$this->setPaginator($total, $page, __METHOD__);
		
		//Views
		$this->view->notificationTypes = $notificationTypes;
		$this->view->pages = ceil($total / $this->maxPerPage);
		$this->view->currentPage = $page;
		$this->view->total = $total;
		$this->view->queryParams = $queryParams;
		$this->view->statuses = NotificationType::$statuses;
		return $this->view;
	}
		
 	/**
 	 *
 	 * Create
 	 *
 	 */
	public function createAction() 
	{
		$notificationType = new NotificationType();
		$this->view->notificationType = $notificationType;
		
		//Views
		$this->view->setTemplate("core/notification-type/form.tpl");
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
			$idNotificationType = $this->params()->fromRoute("id", 0);
			if(!$idNotificationType)
				throw new \Exception($this->i18n->translate('NotificationType not defined.'));
		
			$notificationTypeQuery = new NotificationTypeQuery($this->getAdapter());
			$notificationType = $notificationTypeQuery->findByPkOrThrow($idNotificationType, $this->i18n->translate("NotificationType not found."));
		
			//Views
			$this->view->notificationType = $notificationType;
		} catch (\Exception $e) {
			$this->flashMessenger()->addErrorMessage($e->getMessage());
			$this->redirect()->toRoute(null, array(
				'controller' => 'notificationtype ',
				'action' =>  'index',
			));
		}
		//Views
		$this->view->setTemplate("core/notification-type/form.tpl");
		return $this->view;
	}
		
 	/**
 	 *
 	 * Save
 	 *
 	 */
	public function saveAction() 
	{
		$idNotificationType = $this->params()->fromPost("idNotificationType", 0);
		if($idNotificationType)
		{
			$notificationTypeQuery = new NotificationTypeQuery($this->getAdapter());
			$notificationType = $notificationTypeQuery->findByPkOrThrow($idNotificationType, $this->i18n->translate("NotificationType not found."));
		}else{
			$notificationType = new NotificationType();
			$notificationType->setStatus(NotificationType::ENABLE);
		}
		
		$notificationTypeCatalog = new NotificationTypeCatalog($this->getAdapter());
		$notificationTypeCatalog->beginTransaction();
		try {
			NotificationTypeFactory::populate($notificationType, $this->params()->fromPost());
			$notificationTypeCatalog->save($notificationType);
			($idNotificationType)?$this->newLog($notificationType, Log::UPDATED):$this->newLog($notificationType, Log::CREATED);
			$notificationTypeCatalog->commit();
			$this->flashMessenger()->addSuccessMessage('NotificationType Saved.');
		} catch (\Exception $e) {
			$this->flashMessenger()->addErrorMessage($e->getMessage());
			$notificationTypeCatalog->rollback();
		}
		$this->redirect()->toRoute(null,array('controller'=>'notification-type','action' => 'index',));
		return $this->view;
	}
		
 	/**
 	 *
 	 * Enable
 	 *
 	 */
	public function enableAction() 
	{
		$notificationTypeCatalog = new NotificationTypeCatalog($this->getAdapter());
		$notificationTypeCatalog->beginTransaction();
		try {
			$idNotificationType = $this->params()->fromRoute("id", 0);
			if(!$idNotificationType)
				throw new \Exception($this->i18n("NotificationType not defined."));
			$notificationTypeQuery = new NotificationTypeQuery($this->getAdapter());
			$notificationType = $notificationTypeQuery->findByPkOrThrow($idNotificationType, $this->i18n->translate("NotificationType not found."));
			$notificationType->setStatus(NotificationType::ENABLE);
			$notificationTypeCatalog->save($notificationType);
			$this->newLog($notificationType, NotificationType::ENABLE);
			$notificationTypeCatalog->commit();
			$this->flashMessenger()->addSuccessMessage('NotificationType has been enabled.');
		} catch (\Exception $e) {
			$this->flashMessenger()->addErrorMessage($e->getMessage());
			$notificationTypeCatalog->rollback();
		}
		$this->redirect()->toRoute(null,array('controller'=>'notification-type','action' => 'index',));
		return $this->view;
	}
		
 	/**
 	 *
 	 * Disable
 	 *
 	 */
	public function disableAction() 
	{
		$notificationTypeCatalog = new NotificationTypeCatalog($this->getAdapter());
		$notificationTypeCatalog->beginTransaction();
		try {
			$idNotificationType = $this->params()->fromRoute("id", 0);
			if(!$idNotificationType)
				throw new \Exception($this->i18n("NotificationType not defined."));
			$notificationTypeQuery = new NotificationTypeQuery($this->getAdapter());
			$notificationType = $notificationTypeQuery->findByPkOrThrow($idNotificationType, $this->i18n->translate("NotificationType not found."));
			$notificationType->setStatus(NotificationType::DISABLE);
			$notificationTypeCatalog->save($notificationType);
			$this->newLog($notificationType, NotificationType::DISABLE);
			$notificationTypeCatalog->commit();
			$this->flashMessenger()->addSuccessMessage('NotificationType has been disabled.');
		} catch (\Exception $e) {
			$this->flashMessenger()->addErrorMessage($e->getMessage());
			$notificationTypeCatalog->rollback();
		}
		$this->redirect()->toRoute(null,array('controller'=>'notification-type','action' => 'index',));
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
			$idNotificationType = $this->params()->fromRoute("id", 0);
			$page = $this->params()->fromRoute("page", 1);
			if(!$idNotificationType )
				throw new \Exception($this->i18n("NotificationType not defined."));
			$userQuery = new UserQuery($this->getAdapter());
			$users = $userQuery->find();
			$notificationTypeQuery = new NotificationTypeQuery($this->getAdapter());
			$notificationType = $notificationTypeQuery->findByPkOrThrow($idNotificationType, $this->i18n->translate("NotificationType not found."));
			$notificationTypeLogQuery = new NotificationTypeLogQuery($this->getAdapter());
			$notificationTypeLogQuery->whereAdd(NotificationTypeLog::ID_NOTIFICATION_TYPE, $notificationType->getIdNotificationType());
			$total = $notificationTypeLogQuery->count();
			$notificationTypeLogQuery->addDescendingOrderBy(NotificationTypeLog::ID_NOTIFICATION_TYPE_LOG );
			$notificationTypeLogQuery->limit($this->maxPerPage)->offset(($page -1) * $this->maxPerPage);
			$notificationTypeLogs = $notificationTypeLogQuery->find();
			$notificationTypeQuery = new NotificationTypeQuery($this->getAdapter());
			$notificationTypes = $notificationTypeQuery->find();
			$this->setPaginator($total, $page, __METHOD__);
		
			 //Views
			$this->view->notificationTypeLogs = $notificationTypeLogs;
			$this->view->notificationTypes = $notificationTypes;
			$this->view->users = $users;
		} catch (\Exception $e) {
			$this->flashMessenger()->addErrorMessage($e->getMessage());
			$this->redirect()->toRoute(null,array('controller'=>'notification-type','action' => 'index',));
		}
		return $this->view;
	}
		
 	/**
 	 *
 	 * Log
 	 *
 	 */
	private function newLog(AbstractBean $bean, $event, $note = "") 
	{
		$notificationTypeLogCatalog = new NotificationTypeLogCatalog($this->getAdapter());
		$date = new \DateTime("now");
		$notificationTypeLog = NotificationTypeLogFactory::createFromArray(array(
			NotificationTypeLog::ID_NOTIFICATION_TYPE => $bean->getIdNotificationType(),
			NotificationTypeLog::ID_USER => $this->getUser()->getIdUser(),
			NotificationTypeLog::EVENT => $event,
			NotificationTypeLog::NOTE => $note,
			NotificationTypeLog::TIMESTAMP => $date->format(\DateTime::W3C),
			)
		);
		$notificationTypeLogCatalog->save($notificationTypeLog);
	}
}
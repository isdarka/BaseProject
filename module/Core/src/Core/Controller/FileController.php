<?php

/**
 *
 * FileController
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Controller
 * @copyright 
 * @license 
 * @created Mon Dec 23 12:44:25 2013
 * @version 1.0
 */

namespace Core\Controller;

use BaseProject\Controller\BaseController;
use Core\Query\FileQuery;
use Core\Model\Bean\File;
use Core\Model\Catalog\FileCatalog;
use Core\Model\Factory\FileFactory;
use Model\Bean\AbstractBean;
use Core\Model\Bean\Log;
use Core\Query\FileLogQuery;
use Core\Model\Bean\FileLog;
use Core\Model\Catalog\FileLogCatalog;
use Core\Model\Factory\FileLogFactory;
use Core\Query\UserQuery;

class FileController extends BaseController
{

		
 	/**
 	 *
 	 * Index
 	 *
 	 */
	public function indexAction() 
	{
		$queryParams = $this->params()->fromQuery();
		$fileQuery = new FileQuery($this->getAdapter());
		$fileQuery->filter($queryParams);
		$total = $fileQuery->count();
		$page = $this->params()->fromRoute("page", 1);
		$files = $fileQuery->limit($this->maxPerPage)->offset(($page -1) * $this->maxPerPage)->find();
		$this->setPaginator($total, $page, __METHOD__);
		
		//Views
		$this->view->files = $files;
		$this->view->pages = ceil($total / $this->maxPerPage);
		$this->view->currentPage = $page;
		$this->view->total = $total;
		$this->view->queryParams = $queryParams;
		$this->view->statuses = File::$statuses;
		return $this->view;
	}
		
 	/**
 	 *
 	 * Create
 	 *
 	 */
	public function createAction() 
	{
		$file = new File();
		$this->view->file = $file;
		
		//Views
		$this->view->setTemplate("core/file/form.tpl");
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
			$idFile = $this->params()->fromRoute("id", 0);
			if(!$idFile)
				throw new \Exception($this->i18n->translate('File not defined.'));
		
			$fileQuery = new FileQuery($this->getAdapter());
			$file = $fileQuery->findByPkOrThrow($idFile, $this->i18n->translate("File not found."));
		
			//Views
			$this->view->file = $file;
		} catch (\Exception $e) {
			$this->flashMessenger()->addErrorMessage($e->getMessage());
			$this->redirect()->toRoute(null, array(
				'controller' => 'file ',
				'action' =>  'index',
			));
		}
		//Views
		$this->view->setTemplate("core/file/form.tpl");
		return $this->view;
	}
		
 	/**
 	 *
 	 * Save
 	 *
 	 */
	public function saveAction() 
	{
		$idFile = $this->params()->fromPost("idFile", 0);
		if($idFile)
		{
			$fileQuery = new FileQuery($this->getAdapter());
			$file = $fileQuery->findByPkOrThrow($idFile, $this->i18n->translate("File not found."));
		}else{
			$file = new File();
			$file->setStatus(File::ENABLE);
		}
		
		$fileCatalog = new FileCatalog($this->getAdapter());
		$fileCatalog->beginTransaction();
		try {
			FileFactory::populate($file, $this->params()->fromPost());
			$fileCatalog->save($file);
			($idFile)?$this->newLog($file, Log::UPDATED):$this->newLog($file, Log::CREATED);
			$fileCatalog->commit();
			$this->flashMessenger()->addSuccessMessage('File Saved.');
		} catch (\Exception $e) {
			$this->flashMessenger()->addErrorMessage($e->getMessage());
			$fileCatalog->rollback();
		}
		$this->redirect()->toRoute(null,array('controller'=>'file','action' => 'index',));
		return $this->view;
	}
		
 	/**
 	 *
 	 * Enable
 	 *
 	 */
	public function enableAction() 
	{
		$fileCatalog = new FileCatalog($this->getAdapter());
		$fileCatalog->beginTransaction();
		try {
			$idFile = $this->params()->fromRoute("id", 0);
			if(!$idFile)
				throw new \Exception($this->i18n("File not defined."));
			$fileQuery = new FileQuery($this->getAdapter());
			$file = $fileQuery->findByPkOrThrow($idFile, $this->i18n->translate("File not found."));
			$file->setStatus(File::ENABLE);
			$fileCatalog->save($file);
			$this->newLog($file, File::ENABLE);
			$fileCatalog->commit();
			$this->flashMessenger()->addSuccessMessage('File has been enabled.');
		} catch (\Exception $e) {
			$this->flashMessenger()->addErrorMessage($e->getMessage());
			$fileCatalog->rollback();
		}
		$this->redirect()->toRoute(null,array('controller'=>'file','action' => 'index',));
		return $this->view;
	}
		
 	/**
 	 *
 	 * Disable
 	 *
 	 */
	public function disableAction() 
	{
		$fileCatalog = new FileCatalog($this->getAdapter());
		$fileCatalog->beginTransaction();
		try {
			$idFile = $this->params()->fromRoute("id", 0);
			if(!$idFile)
				throw new \Exception($this->i18n("File not defined."));
			$fileQuery = new FileQuery($this->getAdapter());
			$file = $fileQuery->findByPkOrThrow($idFile, $this->i18n->translate("File not found."));
			$file->setStatus(File::DISABLE);
			$fileCatalog->save($file);
			$this->newLog($file, File::DISABLE);
			$fileCatalog->commit();
			$this->flashMessenger()->addSuccessMessage('File has been disabled.');
		} catch (\Exception $e) {
			$this->flashMessenger()->addErrorMessage($e->getMessage());
			$fileCatalog->rollback();
		}
		$this->redirect()->toRoute(null,array('controller'=>'file','action' => 'index',));
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
			$idFile = $this->params()->fromRoute("id", 0);
			$page = $this->params()->fromRoute("page", 1);
			if(!$idFile )
				throw new \Exception($this->i18n("File not defined."));
			$userQuery = new UserQuery($this->getAdapter());
			$users = $userQuery->find();
			$fileQuery = new FileQuery($this->getAdapter());
			$file = $fileQuery->findByPkOrThrow($idFile, $this->i18n->translate("File not found."));
			$fileLogQuery = new FileLogQuery($this->getAdapter());
			$fileLogQuery->whereAdd(FileLog::ID_FILE, $file->getIdFile());
			$total = $fileLogQuery->count();
			$fileLogQuery->addDescendingOrderBy(FileLog::ID_FILE_LOG );
			$fileLogQuery->limit($this->maxPerPage)->offset(($page -1) * $this->maxPerPage);
			$fileLogs = $fileLogQuery->find();
			$fileQuery = new FileQuery($this->getAdapter());
			$files = $fileQuery->find();
			$this->setPaginator($total, $page, __METHOD__);
		
			 //Views
			$this->view->fileLogs = $fileLogs;
			$this->view->files = $files;
			$this->view->users = $users;
		} catch (\Exception $e) {
			$this->flashMessenger()->addErrorMessage($e->getMessage());
			$this->redirect()->toRoute(null,array('controller'=>'file','action' => 'index',));
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
		$fileLogCatalog = new FileLogCatalog($this->getAdapter());
		$date = new \DateTime("now");
		$fileLog = FileLogFactory::createFromArray(array(
			FileLog::ID_FILE => $bean->getIdFile(),
			FileLog::ID_USER => $this->getUser()->getIdUser(),
			FileLog::EVENT => $event,
			FileLog::NOTE => $note,
			FileLog::TIMESTAMP => $date->format(\DateTime::W3C),
			)
		);
		$fileLogCatalog->save($fileLog);
	}
}
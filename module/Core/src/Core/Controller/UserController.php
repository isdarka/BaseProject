<?php


namespace Core\Controller;

use BaseProject\Controller\BaseController;
use Query\Query;
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
use Core\Query\RoleQuery;
use Core\Model\Bean\Role;
use Core\Model\Exception\UserException;
use Core\Model\Bean\File;
use Core\Helper\File\Upload;
use Core\Model\Catalog\FileCatalog;
use Zend\Json\Json;
use Core\Query\FileQuery;




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
		} catch (UserException $e) {
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
		} catch (UserException $e) {
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
		} catch (UserException $e) {
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
		} catch (UserException $e) {
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
	
	
	public function changePasswordAction()
	{
		try {
			if(!$this->getUser()->getIdUser())
				throw new UserException("User not Defined");
			
			$userQuery = new UserQuery($this->getAdapter());
			$user = $userQuery->findByPkOrThrow($this->getUser()->getIdUser(), $this->i18n->translate("User not Found."));
			
			$this->view->user = $user;
		} catch (UserException $e) {
			$this->flashMessenger()->addErrorMessage($e->getMessage());
			$this->redirect()->toRoute("core", array(
						'module' => 'core',
						'controller' => 'index',
						'action' =>  'index',
				));
		}
		return $this->view;
	}
	
	public function profileAction()
	{
		try {
			if(!$this->getUser()->getIdUser())
				throw new UserException("User not Defined");
			
			$userQuery = new UserQuery($this->getAdapter());
			$user = $userQuery->findByPkOrThrow($this->getUser()->getIdUser(), $this->i18n->translate("User not Found."));
				
			$fileQuery = new FileQuery($this->getAdapter());
			$file = $fileQuery->findByPK($user->getIdFile());
			
			if($file instanceof File == false)
			{
				$file = new File();
				$file->setName("no_image.png");
			}
			
			$file->setPath(Upload::$publicDestinations[Upload::AVATAR]);
			$this->view->user = $user;
			$this->view->file = $file;
		} catch (UserException $e) {
			$this->flashMessenger()->addErrorMessage($e->getMessage());
			$this->redirect()->toRoute("core", array(
					'module' => 'core',
					'controller' => 'index',
					'action' =>  'index',
			));
		}
		return $this->view;
	}
	
	public function saveProfileAction()
	{
		$userCatalog = new UserCatalog($this->getAdapter());
		$userCatalog->beginTransaction();
		try {
			if(!$this->getUser()->getIdUser())
				throw new UserException("User not Defined");
			UserFactory::populate($this->getUser(), $this->params()->fromPost());
			$userCatalog->save($this->getUser());
			$userCatalog->commit();
			$this->flashMessenger()->addSuccessMessage($this->i18n->translate("Profile updated"));
		} catch (UserException $e) {
			$this->flashMessenger()->addErrorMessage($e->getMessage());
		}
		
		$this->redirect()->toRoute(null, array(
				'module' => 'core',
				'controller' => 'user',
				'action' =>  'profile',
		));
	}
	
	public function avatarAction()
	{
// 		var_dump($this->getUser());
		return $this->view;
	}
	
	public function uploadAction()
	{
// 		header('Content-type: application/json');
		$fileCatalog = new FileCatalog($this->getAdapter());
		$fileCatalog->beginTransaction();
		try{
			$fileHttp = (array)$this->params()->fromFiles("File");
	
			$file = new File();
			$file->setName($fileHttp['name']);
			$file->setPath(Upload::$destinations[Upload::AVATAR]);
			$fileCatalog->save($file);
			
			
			$upload = new Upload($file);
			$upload->setType(Upload::AVATAR);
			$upload->setValidators();
			$upload->setDestination();
			$upload->receive();
			
			$fileCatalog->save($file);
			
			if(!$upload->isUploaded())
				throw new \Exception(reset($upload->getErrors()));
				
			
			$userCatalog = new UserCatalog($this->getAdapter());
			$this->getUser()->setIdFile($file->getIdFile());
			$userCatalog->save($this->getUser());
			$fileCatalog->commit();
			die(Json::encode(array(
					"status" => 1, 
					"msn" => $this->i18n->translate("File uploaded."),
					"file" => Upload::$publicDestinations[Upload::AVATAR] . "/" .$file->getName(), 
				)));
		} catch (\Exception $e) {
			$fileCatalog->rollback();
			die(Json::encode(array("status" => 0, "msn" => $e->getMessage())));
		}
	}
	
	public function cropAction()
	{
		try {
			$width = 200;
			$height = 200;
			$quality = 90;
			$x = $this->params()->fromPost("x");
			$y = $this->params()->fromPost("y");
			$w = $this->params()->fromPost("w");
			$h = $this->params()->fromPost("h");
			
			$fileQuery = new FileQuery($this->getAdapter());
			$file = $fileQuery->findByPKOrThrow($this->getUser()->getIdFile(), $this->i18n->translate("File not found"));
			
			$extension = preg_replace("/([a-zA-Z0-9]*)(\.)(\w*)/i", "$3", $file->getName());
			
			if($extension == "jpg" || $extension == "jpeg" )
				$image = imagecreatefromjpeg($file->getPath() . "/" .$file->getName());
			elseif($extension == "png")
				$image = imagecreatefrompng($file->getPath() . "/" .$file->getName());
			elseif($extension == "gif")
				$image = imagecreatefromgif($file->getPath() . "/" .$file->getName());
			
			$imageDst = imagecreatetruecolor($width, $height);
			
			imagecopyresampled($imageDst, $image, 0, 0, $x, $y, $width, $height, $w, $h);
			
			if($extension == "jpg" || $extension == "jpeg" )
				imagejpeg($imageDst,$file->getPath() . "/" .$file->getName(),$quality);
			elseif($extension == "png")
				imagepng($imageDst,$file->getPath() . "/" .$file->getName(),$quality);
			elseif($extension == "gif")
				imagegif($imageDst,$file->getPath() . "/" .$file->getName());
			
		} catch (UserException $e) {
			$this->flashMessenger()->addErrorMessage($e->getMessage());
		}
		
		$this->redirect()->toRoute(null, array(
				'module' => 'core',
				'controller' => 'user',
				'action' =>  'profile',
		));
	}
}
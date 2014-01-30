<?php

/**
 *
 * MessageController
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Controller
 * @copyright 
 * @license 
 * @created Wed Jan 29 11:43:50 2014
 * @version 1.0
 */

namespace Core\Controller;

use BaseProject\Controller\BaseController;
use Core\Query\MessageQuery;
use Core\Model\Bean\Message;
use Core\Model\Catalog\MessageCatalog;
use Core\Model\Factory\MessageFactory;
use Model\Bean\AbstractBean;
use Core\Model\Bean\Log;
use Core\Query\MessageLogQuery;
use Core\Model\Bean\MessageLog;
use Core\Model\Catalog\MessageLogCatalog;
use Core\Model\Factory\MessageLogFactory;
use Core\Query\UserQuery;
use Core\Model\Exception\MessageException;
use Core\Model\Bean\User;
use Core\Model\Bean\UserMessage;
use Core\Model\Catalog\UserMessageCatalog;
use Zend\Json\Json;
use Core\Query\UserMessageQuery;
use Core\Query\FileQuery;
use Core\Model\Bean\File;
use Core\Helper\File\Upload;

class MessageController extends BaseController
{

		
 	/**
 	 *
 	 * Index
 	 *
 	 */
	public function indexAction() 
	{
		$queryParams = $this->params()->fromQuery();
		$messageQuery = new MessageQuery($this->getAdapter());
		$messageQuery->filter($queryParams);
		$total = $messageQuery->count();
		$page = $this->params()->fromRoute("page", 1);
		$messages = $messageQuery->limit($this->maxPerPage)->offset(($page -1) * $this->maxPerPage)->find();
		$this->setPaginator($total, $page, __METHOD__);
		
		//Views
		$this->view->messages = $messages;
		$this->view->pages = ceil($total / $this->maxPerPage);
		$this->view->currentPage = $page;
		$this->view->total = $total;
		$this->view->queryParams = $queryParams;
		$this->view->statuses = Message::$statuses;
		return $this->view;
	}
		
 	/**
 	 *
 	 * Create
 	 *
 	 */
	public function createAction() 
	{
		$message = new Message();
		$this->view->message = $message;
		
		//Views
		$this->view->setTemplate("core/message/form.tpl");
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
			$idMessage = $this->params()->fromRoute("id", 0);
			if(!$idMessage)
				throw new \Exception($this->i18n->translate('Message not defined.'));
		
			$messageQuery = new MessageQuery($this->getAdapter());
			$message = $messageQuery->findByPkOrThrow($idMessage, $this->i18n->translate("Message not found."));
		
			//Views
			$this->view->message = $message;
		} catch (\Exception $e) {
			$this->flashMessenger()->addErrorMessage($e->getMessage());
			$this->redirect()->toRoute(null, array(
				'controller' => 'message ',
				'action' =>  'index',
			));
		}
		//Views
		$this->view->setTemplate("core/message/form.tpl");
		return $this->view;
	}
		
 	/**
 	 *
 	 * Save
 	 *
 	 */
	public function saveAction() 
	{
		$idMessage = $this->params()->fromPost("idMessage", 0);
		if($idMessage)
		{
			$messageQuery = new MessageQuery($this->getAdapter());
			$message = $messageQuery->findByPkOrThrow($idMessage, $this->i18n->translate("Message not found."));
		}else{
			$message = new Message();
			$message->setStatus(Message::ENABLE);
		}
		
		$messageCatalog = new MessageCatalog($this->getAdapter());
		$messageCatalog->beginTransaction();
		try {
			MessageFactory::populate($message, $this->params()->fromPost());
			$messageCatalog->save($message);
			($idMessage)?$this->newLog($message, Log::UPDATED):$this->newLog($message, Log::CREATED);
			$messageCatalog->commit();
			$this->flashMessenger()->addSuccessMessage('Message Saved.');
		} catch (\Exception $e) {
			$this->flashMessenger()->addErrorMessage($e->getMessage());
			$messageCatalog->rollback();
		}
		$this->redirect()->toRoute(null,array('controller'=>'message','action' => 'index',));
		return $this->view;
	}
		
 	/**
 	 *
 	 * Enable
 	 *
 	 */
	public function enableAction() 
	{
		$messageCatalog = new MessageCatalog($this->getAdapter());
		$messageCatalog->beginTransaction();
		try {
			$idMessage = $this->params()->fromRoute("id", 0);
			if(!$idMessage)
				throw new \Exception($this->i18n("Message not defined."));
			$messageQuery = new MessageQuery($this->getAdapter());
			$message = $messageQuery->findByPkOrThrow($idMessage, $this->i18n->translate("Message not found."));
			$message->setStatus(Message::ENABLE);
			$messageCatalog->save($message);
			$this->newLog($message, Message::ENABLE);
			$messageCatalog->commit();
			$this->flashMessenger()->addSuccessMessage('Message has been enabled.');
		} catch (\Exception $e) {
			$this->flashMessenger()->addErrorMessage($e->getMessage());
			$messageCatalog->rollback();
		}
		$this->redirect()->toRoute(null,array('controller'=>'message','action' => 'index',));
		return $this->view;
	}
		
 	/**
 	 *
 	 * Disable
 	 *
 	 */
	public function disableAction() 
	{
		$messageCatalog = new MessageCatalog($this->getAdapter());
		$messageCatalog->beginTransaction();
		try {
			$idMessage = $this->params()->fromRoute("id", 0);
			if(!$idMessage)
				throw new \Exception($this->i18n("Message not defined."));
			$messageQuery = new MessageQuery($this->getAdapter());
			$message = $messageQuery->findByPkOrThrow($idMessage, $this->i18n->translate("Message not found."));
			$message->setStatus(Message::DISABLE);
			$messageCatalog->save($message);
			$this->newLog($message, Message::DISABLE);
			$messageCatalog->commit();
			$this->flashMessenger()->addSuccessMessage('Message has been disabled.');
		} catch (\Exception $e) {
			$this->flashMessenger()->addErrorMessage($e->getMessage());
			$messageCatalog->rollback();
		}
		$this->redirect()->toRoute(null,array('controller'=>'message','action' => 'index',));
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
			$idMessage = $this->params()->fromRoute("id", 0);
			$page = $this->params()->fromRoute("page", 1);
			if(!$idMessage )
				throw new \Exception($this->i18n("Message not defined."));
			$userQuery = new UserQuery($this->getAdapter());
			$users = $userQuery->find();
			$messageQuery = new MessageQuery($this->getAdapter());
			$message = $messageQuery->findByPkOrThrow($idMessage, $this->i18n->translate("Message not found."));
			$messageLogQuery = new MessageLogQuery($this->getAdapter());
			$messageLogQuery->whereAdd(MessageLog::ID_MESSAGE, $message->getIdMessage());
			$total = $messageLogQuery->count();
			$messageLogQuery->addDescendingOrderBy(MessageLog::ID_MESSAGE_LOG );
			$messageLogQuery->limit($this->maxPerPage)->offset(($page -1) * $this->maxPerPage);
			$messageLogs = $messageLogQuery->find();
			$messageQuery = new MessageQuery($this->getAdapter());
			$messages = $messageQuery->find();
			$this->setPaginator($total, $page, __METHOD__);
		
			 //Views
			$this->view->messageLogs = $messageLogs;
			$this->view->messages = $messages;
			$this->view->users = $users;
		} catch (\Exception $e) {
			$this->flashMessenger()->addErrorMessage($e->getMessage());
			$this->redirect()->toRoute(null,array('controller'=>'message','action' => 'index',));
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
		$messageLogCatalog = new MessageLogCatalog($this->getAdapter());
		$date = new \DateTime("now");
		$messageLog = MessageLogFactory::createFromArray(array(
			MessageLog::ID_MESSAGE => $bean->getIdMessage(),
			MessageLog::ID_USER => $this->getUser()->getIdUser(),
			MessageLog::EVENT => $event,
			MessageLog::NOTE => $note,
			MessageLog::TIMESTAMP => $date->format(\DateTime::W3C),
			)
		);
		$messageLogCatalog->save($messageLog);
	}
	
	public function saveMessageAction()
	{
		header('Content-type: application/json');
		$messageCatalog = new MessageCatalog($this->getAdapter());
		$messageCatalog->beginTransaction();
		try {
			$idUsers = (array) $this->params()->fromPost("idUsers");
			$subject = $this->params()->fromPost("subject");
			$body = $this->params()->fromPost("body");
			
			$userQuery = new UserQuery($this->getAdapter());
			$userQuery->whereAdd(User::ID_USER, $idUsers, UserQuery::IN);
			
			$userCollection = $userQuery->find();
			
			if($userCollection->isEmpty())
				throw new MessageException($this->i18n->translate('No users selected'));
			
			$message = new Message();
			$message->setSubject($subject);
			$message->setMessage($body);
			$message->setIdUser($this->getUser()->getIdUser());
			$messageCatalog->save($message);
			
			$userMessageCatalog = new UserMessageCatalog($this->getAdapter());
			
			/* @var $user User */
			foreach ($userCollection as $user)
			{
				$userMessage = new UserMessage();
				$userMessage->setIdUser($user->getIdUser());
				$userMessage->setIdMessage($message->getIdMessage());
				$userMessageCatalog->save($userMessage);
			}
			$messageCatalog->commit();
			die(Json::encode(array("status" => 1, "msn" => $this->i18n->translate('Message Sent.'))));
		} catch (MessageException $e) {
			$messageCatalog->rollback();
			die(Json::encode(array("status" => 1, "msn" => $e->getMessage())));
		}
	}
	
	
	public function hasMessagesAction()
	{
		header('Content-type: application/json');
		try {
			$userMessageQuery = new UserMessageQuery($this->getAdapter());
			$userMessageQuery->whereAdd(UserMessage::ID_USER, $this->getUser()->getIdUser());
			$userMessageQuery->whereAdd(UserMessage::STATUS, UserMessage::UNREAD);
			$quantity = $userMessageQuery->count();
			
			die(Json::encode(array("status" => 1, "messages" => $quantity)));
		} catch (MessageException $e) {
			die(Json::encode(array("status" => 1, "msn" => $e->getMessage())));
		}
	}
	
	public function getMessagesAction()
	{
		header('Content-type: application/json');
		try {
			$userMessageQuery = new UserMessageQuery($this->getAdapter());
			$userMessageQuery->whereAdd(UserMessage::ID_USER, $this->getUser()->getIdUser());
			$userMessageQuery->whereAdd(UserMessage::STATUS, UserMessage::UNREAD);
			$userMessageCollection = $userMessageQuery->find();
				
			$messagesQuery = new MessageQuery($this->getAdapter());
			$messagesQuery->whereAdd(Message::ID_MESSAGE, $userMessageCollection->getMessageIds(), MessageQuery::IN);
			$messageCollection = $messagesQuery->find();
			
			$userQuery = new UserQuery($this->getAdapter());
			$userQuery->whereAdd(User::ID_USER, $messageCollection->getUserIds(), UserQuery::IN);
			$userCollection = $userQuery->find();
			
			$fileQuery = new FileQuery($this->getAdapter());
			$fileQuery->whereAdd(File::ID_FILE, $userCollection->getFileIds(), FileQuery::IN);
			$fileCollection = $fileQuery->find();
			
			/* @var $file File */
			foreach ($fileCollection as $file)
				$file->setPath(Upload::$publicDestinations[Upload::AVATAR]);
			
			$userAvatar = array();
			/* @var $user User */
			foreach ($userCollection as $user)
				$userAvatar[] = array(
						"idUser" => $user->getIdUser(),
						"avatar" => $fileCollection->getByPK($user->getIdFile())->getPath() ."/".$fileCollection->getByPK($user->getIdFile())->getName(),
					);
			
			die(Json::encode(array(
					"status" => 1, 
					"messages" => $messageCollection->toArray(),
					"userAvatars" => $userAvatar,
			)));
		} catch (MessageException $e) {
			die(Json::encode(array("status" => 1, "msn" => $e->getMessage())));
		}
	}
	
	
	public function getMessageAction()
	{
		header('Content-type: application/json');
		$userMessageCatalog = new UserMessageCatalog($this->getAdapter());
		$userMessageCatalog->beginTransaction();
		try {
			$idMessage = $this->params()->fromPost("idMessage", 0);
			if(!$idMessage)
				throw new MessageException("Message not defined");
			
			$userMessageQuery = new UserMessageQuery($this->getAdapter());
			$userMessageQuery->whereAdd(UserMessage::ID_USER, $this->getUser()->getIdUser());
			$userMessageCollection = $userMessageQuery->find();
			
			$userMessage = $userMessageCollection->getByIdMessageAndIdUser($idMessage, $this->getUser()->getIdUser());
			if($userMessage instanceof UserMessage == false)
				throw new MessageException($this->i18n->translate("Can show message"));
			
			$messageQuery = new MessageQuery($this->getAdapter());
			$message = $messageQuery->findByPKOrThrow($idMessage, $this->i18n->translate("Message not found"));

			$userQuery = new UserQuery($this->getAdapter());
			$user = $userQuery->findByPk($message->getIdUser());
			if($user->getIdFile()){
				$fileQuery = new FileQuery($this->getAdapter());
				$file = $fileQuery->findByPK($user->getIdFile());
			}else{
				$file = new File();
				$file->setName("no_image.png");
			}
				
			
			$file->setPath(Upload::$publicDestinations[Upload::AVATAR]);
			
			$userMessage->setStatus(UserMessage::READ);
			$userMessageCatalog->save($userMessage);
			$userMessageCatalog->commit();
			die(Json::encode(array(
					"status" => 1,
					"message" => $message->toArray(),
					"userAvatar" => $file->toArray(),
			)));
			
		} catch (MessageException $e) {
			$userMessageCatalog->rollback();
			die(Json::encode(array("status" => 1, "msn" => $e->getMessage())));
		}
	}
	
	public function myMessagesAction()
	{
		
		$userMessageQuery = new UserMessageQuery($this->getAdapter());
		$userMessageQuery->whereAdd(UserMessage::ID_USER, $this->getUser()->getIdUser());
		$userMessageCollection = $userMessageQuery->find();
		
		$queryParams = $this->params()->fromQuery();
		$messageQuery = new MessageQuery($this->getAdapter());
		$messageQuery->filter($queryParams);
		$total = $messageQuery->count();
		$page = $this->params()->fromRoute("page", 1);
		$messageQuery->whereAdd(Message::ID_MESSAGE, $userMessageCollection->getMessageIds(), MessageQuery::IN);
		$messageQuery->addDescendingOrderBy(Message::ID_MESSAGE);
		$messages = $messageQuery->limit($this->maxPerPage)->offset(($page -1) * $this->maxPerPage)->find();
		$this->setPaginator($total, $page, __METHOD__);
		
		//Views
		$this->view->messages = $messages;
		$this->view->pages = ceil($total / $this->maxPerPage);
		$this->view->currentPage = $page;
		$this->view->total = $total;
		$this->view->queryParams = $queryParams;
		$this->view->statuses = Message::$statuses;
		
		return $this->view;
	}
}
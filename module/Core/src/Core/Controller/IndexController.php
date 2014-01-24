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
use Zend\Mvc\I18n\Translator;
use Core\Query\MexicoZipCodeQuery;
use Core\Model\Bean\MexicoZipCode;
use Zend\Json\Json;
// use Zend\I18n\View\Helper\Translate;
// use Zend\I18n\Translator\Translator;




class IndexController extends BaseController
{
// 		protected $services;
	
// 		public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
// 		{
// // 			var_dump($serviceLocator);
// // 			var_dump($serviceLocator->get("Zend\Db\Adapter"));
// // 			die();
// 			$this->services = $serviceLocator;
// 		}
	
// 		public function getServiceLocator()
// 		{
// 			return $this->services;
// 		}
	
// 		public function dispatch(Request $request, Response $response = null)
// 		{
// 			// ...
	
// 			// Retrieve something from the service manager
// 			$router = $this->getServiceLocator()->get('Router');
	
// 			// ...
// 		}
	public function indexAction()
	{
// 		die();
// 		$renderer = $this->getServiceLocator()->get('Zend\View\Renderer\RendererInterface');
// 		$url = $renderer->basePath();
// 		var_dump($url);
		
// 		die();
// 		var_dump($this->getBasePath());
// 		die();
// 		try {
// 			$transport = $this->getServiceLocator()->get('mail.transport');
			
			
			

// 			$message = new Message();
// // 			$message->
// 			$message->addTo('irvelasco@pcsmexico.com')
// 			->addFrom('irvelasco@pcsmexico.com')
// 			->setSubject('Greetings and Salutations!')
// 			->setBody("Sorry, I'm going to be late today!");
			
			// Setup SMTP transport using LOGIN authentication
// 			$transport = new SmtpTransport();
// 			$options   = new SmtpOptions(array(
// 					'name'              => 'localhost.localdomain',
// 					'host'              => '127.0.0.1',
// 					'connection_class'  => 'login',
// 					'connection_config' => array(
// 							'username' => 'user',
// 							'password' => 'pass',
// 					),
// 			));
// 			$transport->setOptions($options);
// 			$transport->send($message);
			
			
// 			$message = new Message();
// 			$message->addTo('irvelasco@pcsmexico.com')
// 			->addFrom('musicogui@gmail.com')
// 			->setSubject('Greetings and Salutations!')
// 			->setBody("Sorry, I'm going to be late today!");
			
// 			$transport = new Sendmail();
// 			var_dump($transport->send($message));
// 			$viewModel = new ViewModel();
// 			$viewModel->setTemplate('core/index/index.phtml');
// 			$viewRender = $this->getServiceLocator()->get('ViewRenderer');
//     	$html = $viewRender->render($viewModel);
//     	echo ($html);
// // 			$view->
// 		} catch (Exception $e) {
// 			var_dump($e->getMessage());
// 		}
		
// // 		die("Fin");
// 		$adapter = $this->getServiceLocator()->get("Adapter");
// 		$modulesQuery = new ModuleQuery($adapter);
// 		$modulesQuery->innerJoin(new ModuleBean());
// 		var_dump($modulesQuery->toSql());
// 		$modulesQuery->whereAdd("id_module", 25);
// 		var_dump($modulesQuery->findByPk(25));
// 		var_dump($modulesQuery->findByPkOrThrow("60", "EROROROR"));
// 		var_dump($modulesQuery->findOne());
// 		$module = new ModuleBean();
// // 		$module->setIdModule(1);
// 		$module->setName("nombre");
// 		$moduleCatalog = new ModuleCatalog($adapter);
// 		$moduleCatalog->save($module);
// 		$query = new Query($adapter, "pcs_common_persons", "Persons");
// 		$query->whereAdd("id_person", "1");
// 		$query->join($name, $on)
// 		$query
// 		var_dump($query->toSql());
// 		var_dump($query->count());
// 		var_dump($query->fetchOne());
// 		var_dump($query->fecthAll());
// 		$de = new Demo();
// 		$de->getSL();
// 		die();
// 		$d = new Comparision();
// 		die();
// 		$bq = new BaseQuery();
		
// 		die();
//platformInterface
// 		$adapter = $this->getServiceLocator()->get("Adapter");
// // 		$adapter instanceof Adapter;
// // 		var_dump($adapter->getPlatform());
// 		$personMetadata = new PersonMetadata($adapter);
// 		$personQuery = $personMetadata->getQuery();
// 		var_dump($personQuery->toSql());
// 		var_dump($personQuery->fecthAll());
// 		die();
// 		$personQuery->prepareStatement($adapter, $statementContainer);
// 		$personQuery->fecthAll();
		
		
		// 		$statement = $sql->getSqlStringForSqlObject($select);
		// 		$statement = $sql->prepareStatementForSqlObject($select);
		// 		var_dump($statement);
		// // 		die();
		// 		$result = $statement->execute();
// 		$personQuery2 = clone $personQuery;
// 		$personQuery->where->equalTo("id_employee", 73);
// 		$personQuery->where->equalTo("id_employee", 22);
// 		$personQuery->where->__get("or");
// 		$personQuery->whereAdd("id_user", array(1,1,2), Query::IN);
// 		$personQuery->where->__get("or");//$this->where->__get("or");
// 		$personQuery->whereOrAdd("id_user", "25", null, Predicate::COMBINED_BY_OR);
// 		$personQuery->whereAdd("PRI", 25, Query::EQUAL);
// 		$personQuery->whereOrAdd("ORPRI", 25, Query::EQUAL);
// 		$personQuery->whereOrAdd("ORPRI", 25, Query::EQUAL);
// 		$personQuery->whereOrAdd("ORPRI", 25, Query::EQUAL);
// 		$personQuery->columns(array("dtes" => "MAX(dtes)", "asd"));
// 		$personQuery->columns(array("dtesssss"));
		
// 		$personQuery->whereAdd("PRI", array(25, 100), Query::BETWEEN);

// 		$personQuery->addColumn("demo", "demo", "SUBSTRING(%s, 1, 3)");
// 		$personQuery->addColumn("tabla", "alias");
// 		$personQuery->columns(array("uno"));
// 		$personQuery->addColumn("tablatabla");
// 		$personQuery->addDescendingOrderBy("demo");
// 		$sf = new StringFunction();
// 		$personQuery->group($group)
// 		$personQuery->addColumn($personQuery2, "test");
// 		$personQuery->columns(array("test" => new Expression('SUBSTRING(%s, 1, 3)')));
// 		var_dump($personQuery->toSql());
		
// 		$metadata = new \BaseProject\Model\Metadata\Metadata($adapter, "pcs_common_users");
// 		$query = $metadata->getQuery();
		
// 		$where = new Where();
// 		$where->in("id_user", array(1,1,2));
				
// 		$query->where($where);
// 		$adapter = new Adapter($driver);
// 		$adapter->getPlatform()
// 		var_dump($query->getSqlString($adapter->getPlatform()));
// 		die();
		
// 		$metadata = new Metadata($adapter);
		
		// get the table names
// 		$tableNames = $metadata->getTable("pcs_common_users");
// 		var_dump($tableNames);
		
// // 		die();
// 		$query = Query::create($adapter);
// 		$query->from(array("Users" => "pcs_common_users"));
// 		$query->whereAdd("id_user", array(1,1,2), Query::IN);
		
		
// 		var_dump($query->toSql());
// 		$query = Query::create($adapter);
// 		$query->from(array("Users" => "pcs_common_users"));
// 		$query->whereAdd("id_user", 1, Query::EQUAL);
// 		$mysql = new Mysql();
// 		$platformInterface = new  PlatformInterface();
// 		$platformInterface->
// 		PlatformInterface
// 	$m = new Mysql();
		
// 		var_dump($query->toSql());
// 		die();		
		
// 		$this->plugin('basePath')->setBasePath()
// $url =$this->url();
// 		var_dump($url);
		//var_dump($this->url()->fromRoute('home'));
// 		die();
// echo "h";
// var_dump($this->getServiceLocator()->get("Adapter"));
// die();
		/** @var $adapter Zend\Db\Adapter\Adapter */
// 		$adapter = $this->getServiceLocator()->get("Adapter");
// 		var_dump($adapter->getDriver()->getConnection());
		
// 		$sql = new Sql($this->getServiceLocator()->get("Adapter"));
// // 		$sql->setTable("pcs_common_users");
// 		$select = $sql->select();
// // 		$select = new Select();
// 		$select->from(array("E" => "pcs_erp_core_employees"));
// // 		$select->
// 		$select->join(array("P" => "pcs_common_persons"), "P.id_person=E.id_person", array("id_person"), Select::JOIN_INNER);
		
// 		$select->columns(array("id_employee"));
// 		$where = new Where();//(null,PredicateSet::OP_OR);
// 		$where->equalTo("id_employee", 73);
// 		$where->__get("or");
// 		$where->equalTo("id_employee", 22);
// 		$where->addPredicate(PredicateSet::OP_OR);
// 		$select->where($where, PredicateSet::OP_OR);
		
// 		$where = new Where();
// 		$where->equalTo("id_employee", 22);
		
// 		$select->where($where, PredicateSet::OP_OR);
// 		$statement = $sql->getSqlStringForSqlObject($select);
// 		$statement = $sql->prepareStatementForSqlObject($select);
// 		var_dump($statement);
// // 		die();
// 		$result = $statement->execute();
		
		
// 		$rowset = new ResultSet();
// 		$rowset->initialize($result);
// 		var_dump($rowset->toArray());
// 		$onerow=$rowset->current();
// 		var_dump($onerow);
// 		$select->
		return $this->view;
	}
	
	
	public function messageAction()
	{
		var_dump($this->i18n);
		
		$trans = $this->i18n;
		$trans instanceof Translator;
		$trans->translate($message);
		try{
// 			var_dump($this->serviceLocator->get("translator"));
// 			$sm = $this->getServiceLocator()->get("translator");
// 			$translator = $this->getServiceLocator()->get('translator');
// 			var_dump($translator);
		}catch (\Exception $e)
		{
			var_dump($e->getMessage());
		}
		
// 		die("ds");
// 		throw new \Exception("te");
// 		$return = array('success' => true);
// 		$flashMessenger = $this->flashMessenger();
// $this->flashMessenger()->clearMessages();
// 		$this->flashMessenger()->->addErrorMessage("Error Message");
// 		$this->flashMessenger()->getMessages()
// 		if ($flashMessenger->hasMessages()) {
// 			$return['messages'] = $flashMessenger->getMessages();
// 		}
// 		return $return;
// 		$this->flashMessenger()->addMessage("test");
// 		$this->flashMessenger()->ha
		$this->flashMessenger()->addErrorMessage($this->i18n->translate("Error"));
		$this->flashMessenger()->addInfoMessage($this->i18n->translate("Info"));
		$this->flashMessenger()->addSuccessMessage($this->i18n->translate("Success"));
		$this->flashMessenger()->addMessage($this->i18n->translate("Message"));
// 		$this->flashMessenger()->getSuccessMessages()("asd");
// 		var_dump($this->flashMessenger()->getMessages());
		
// 		var_dump($this->flashMessenger()->getCurrentInfoMessages());
// 		var_dump($this->view);
// 		$this->view->flashMessenger = $this->flashMessenger();
		return $this->view;
	}
	
	public function aloAction()
	{
		// ... do some work ...
		$this->flashMessenger()->addInfoMessage('You are now logged in.');
// 	 $this->redirect()->toRoute('imessage');
		$this->redirect()->toRoute(null, array(
				'controller' => 'index',
				'action' =>  'message',
		));
	}
	
	
	public function zipcodeAction()
	{
		header('Content-type: application/json');
		$zipcode = $this->params()->fromPost("zipcode");
		
		$search = array(MexicoZipCode::D_CODIGO => $zipcode);
		$zipcodeQuery = new MexicoZipCodeQuery($this->getAdapter());
		$zipcodeQuery->filter($search);
		
		$zipcodes = $zipcodeQuery->find();
		die(Json::encode($zipcodes->toArray()));
	}
}
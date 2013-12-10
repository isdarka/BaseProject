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
use Zend\Mvc\Application;
use Core\Model\Factory\ModuleFactory;
use Core\Model\Metadata\ModelMetadata;
use Core\Model\Metadata\ModuleMetadata;
use Core\Model\Collection\ModuleCollection;
use Core\Query\ControllerQuery;
use Core\Model\Catalog\ControllerCatalog;
use Core\Model\Exception\ControllerException;
use Core\Model\Factory\ControllerFactory;
use Core\Model\Bean\Controller;
use Core\Model\Exception\ActionException;
use Core\Query\ActionQuery;
use Core\Model\Bean\Action;
use Core\Model\Factory\ActionFactory;
use Core\Model\Catalog\ActionCatalog;
use Core\Query\RoleQuery;
use Zend\Json\Json;
use Core\Model\Catalog\RoleCatalog;
use Zend\Filter\Int;
use Core\Model\Bean\Role;
use BaseProject\Security\Acl;



class CoreController extends BaseController
{
	
	public function inspectAction()
	{
		// Get all Modules and save new
		$moduleCatalog = new ModuleCatalog($this->getAdatper());
		$moduleCatalog->beginTransaction();
		try{
			$applicationConfig = include 'config/application.config.php';
			$moduleMetadata = new ModuleMetadata();
			$moduleQuery = new ModuleQuery($this->getAdatper());
			$moduleCollection = $moduleQuery->find();
			foreach ($applicationConfig['modules'] as $name)
			{
				
				if($moduleCollection->getByName($name) instanceof ModuleBean == false){
					$module = ModuleFactory::createFromArray(array(
							ModuleBean::NAME => $name
					));
					$moduleCatalog->save($module);
					$moduleCollection->append($module);
				}
			}
			$this->inspectControllers($moduleCollection);
			$moduleCatalog->commit();
			$this->flashMessenger()->addSuccessMessage('Complete Inspection.');
		}catch (ModuleException $e){
			$moduleCatalog->rollback();
			$this->flashMessenger()->addErrorMessage($e->getMessage());
		}catch (ControllerException $e){
			$moduleCatalog->rollback();
			$this->flashMessenger()->addErrorMessage($e->getMessage());
		}catch (ActionException $e){
			$moduleCatalog->rollback();
			$this->flashMessenger()->addErrorMessage($e->getMessage());
		}
		$this->redirect()->toRoute(null,array('controller'=>"core",'action' => "config",));
		return $this->view;
	}
	 
	private function inspectControllers(ModuleCollection $moduleCollection)
	{
		$controllerCatalog = new ControllerCatalog($this->getAdatper());
		try {
			/* @var $module ModuleBean */
			$controllerQuery = new ControllerQuery($this->getAdatper());
			$controllers = $controllerQuery->find();
			foreach ($moduleCollection as $module)
			{
				if(file_exists('module/' . $module->getName() . '/config/module.config.php')){
					$moduleConfig = include 'module/' . $module->getName() . '/config/module.config.php';
					$controllerInvokables = ($moduleConfig['controllers']['invokables']);
					if(is_array($controllerInvokables))
					foreach ($controllerInvokables as $controller)
					{
						if(class_exists($controller))
						{
							if($controllers->getByName($controller) instanceof Controller == false){
								$controllerBean = ControllerFactory::createFromArray(array(
										Controller::ID_MODULE => $module->getIdModule(),
										Controller::NAME => $controller,
								));
								$controllerCatalog->save($controllerBean);
								$actionsMethods = array_filter(get_class_methods($controller),array($this, "filterAction"));
								$this->inspectActions($controllerBean, $actionsMethods);
							}
						}
					}
				}
					
			}
		} catch (ControllerException $e) {
			throw $e;
		}
		
	}
	
	private function inspectActions(Controller $controller,array $methods)
	{
		$actionCatalog = new ActionCatalog($this->getAdatper());
		try {
			$actionQuery = new ActionQuery($this->getAdatper());
			$actionQuery->whereAdd(Action::ID_CONTROLLER, $controller->getIdController());
			$actions = $actionQuery->find();
			foreach ($methods as $method)
			{
				if($actions->getByNameAndIdController($method, $controller->getIdController()) instanceof Action == false)
				{
					$action = ActionFactory::createFromArray(array(
							Action::ID_CONTROLLER => $controller->getIdController(),
							Action::NAME => $method,
					));
					$actionCatalog->save($action);
				}
			}
		} catch (ActionException $e) {
			throw $e;
		}
	}
	
	/**
	 * 
	 * @param string $method
	 * @return string | boolean
	 */
	private function filterAction($method)
	{
		return preg_match('/^[a-zA-Z0-9_]*Action$/', $method);
	}
	
	public function configAction()
	{
// 		var_dump($acl->getRoles());
// 		var_dump($acl->isAllowed("3", "Core\Controller\Index::alo"));
// 		var_dump($acl->getResources());
// 		var_dump($this->params()->fromRoute());
// 		die();
		$moduleQuery = new ModuleQuery($this->getAdatper());
		$controllerQuery = new ControllerQuery($this->getAdatper());
		$actionQuery = new ActionQuery($this->getAdatper());
		$roleQuery = new RoleQuery($this->getAdatper());
		
		$controllers = $controllerQuery->find();
		$moduleQuery->whereAdd(ModuleBean::ID_MODULE, $controllers->getModuleIds(), ModuleQuery::IN);
		$modules = $moduleQuery->find();
		$actions = $actionQuery->find();
		$roles = $roleQuery->find();
		
		$roleActionsQuery = new RoleQuery($this->getAdatper());
		$roleActionsQuery->innerJoinAction();
		$roleActions = $roleActionsQuery->fecthAll();
		$actionRoles = array();
		foreach ($roleActions as $array)
		{
			if(!is_array($actionRoles[$array['id_action']]))
				$actionRoles[$array['id_action']] = array();
			
			$actionRoles[$array['id_action']][$array['id_role']] = 1;
		}
		// Views
		$this->view->actionRoles = $actionRoles;
		$this->view->modules = $modules;
		$this->view->controllers = $controllers;
		$this->view->actions = $actions;
		$this->view->roles = $roles;
		return $this->view;
	}
	
	public function setPrivilegeAction()
	{
		header('Content-type: application/json');
		$idAction = $this->params()->fromPost('idAction');
		$idRole = $this->params()->fromPost('idRole');
		$allow = (int) $this->params()->fromPost('allow');
		$roleCatalog = new RoleCatalog($this->getAdatper());
		$roleCatalog->beginTransaction();
		try {
			$actionQuery = new ActionQuery($this->getAdatper());
			$roleQuery = new RoleQuery($this->getAdatper());
			
			$role = $roleQuery->findByPkOrThrow($idRole, $this->i18n->translate('Role not found.'));
			$action = $actionQuery->findByPkOrThrow($idAction, $this->i18n->translate('Action not found.'));
			if($allow)
				$roleCatalog->linkToAction($action->getIdAction(), $role->getIdRole());
			else 
				$roleCatalog->unlinkFromAction($action->getIdAction(), $role->getIdRole());
			$roleCatalog->commit();
			die(Json::encode(array("status" => 1, "msn" => $this->i18n->translate('Permission saved'))));
		} catch (\Exception $e) {
			$roleCatalog->rollback();
			die(Json::encode(array("status" => 0, "msn" => $e->getMessage())));
		}
	}
	
}
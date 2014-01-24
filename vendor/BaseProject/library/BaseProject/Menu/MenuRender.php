<?php
/**
 *
 * @author isdarka
 * @created Dec 9, 2013 12:18:22 PM
 */

namespace BaseProject\Menu;

use Core\Query\MenuItemQuery;
use Core\Model\Bean\MenuItem;
use Core\Model\Collection\MenuItemCollection;
use Core\Model\Bean\User;
use Core\Query\ControllerQuery;
use Core\Query\ActionQuery;
use Core\Model\Bean\Role;
use Core\Query\RoleQuery;
use Core\Model\Collection\ActionCollection;
use Core\Model\Bean\Action;
use Core\Model\Bean\Controller;
class MenuRender
{
	private $adapter;
	private $parents;
	private $baseUrl;
	private $menuItems;
	private $user;
	private $role;
	private $availableActions;
	public function __construct($adapter, $baseUrl, User $user)
	{
		$this->adapter = $adapter;
		$this->baseUrl = $baseUrl;
		$this->user = $user;
	}
	
	/**
	 * 
	 * @return Role
	 */
	public function getRole()
	{
		if($this->role instanceof Role == false)
		{
			$roleQuery = new RoleQuery($this->adapter);
			$this->role = $roleQuery->findByPk($this->user->getIdRole());
		}	
		return $this->role;
	}
	
	
	public function getCamelCase($string)
	{
		return lcfirst(join("", array_map("ucwords", explode("_", $string))));
	}
	
	public function getUnderscore($string)
	{
		return strtolower(preg_replace('/(?<=[a-z])([A-Z])/', '-$1', $string));
	}
	
	/**
	 * @return MenuItemCollection
	 */
	private function getParents()
	{
		if($this->parents instanceof MenuItemCollection)
			return $this->parents;
		
		$menuItemQuery = new MenuItemQuery($this->adapter);
		$menuItemQuery->whereAdd(MenuItem::ID_PARENT, null, MenuItemQuery::IS_NULL);
		$menuItemQuery->whereAdd(MenuItem::STATUS, MenuItem::ENABLE);
		$menuItemQuery->addAscendingOrderBy(MenuItem::ORDER);
		$menuItems = $menuItemQuery->find();

		$this->parents = $menuItems;
		return $this->parents;
	}
	
	/**
	 * @return ActionCollection
	 */
	private function getAvailableActions()
	{
		if($this->availableActions instanceof ActionCollection == false)
		{
			$actionQuery = new ActionQuery($this->adapter);
			$actionQuery->innerJoinRole();
			$actionQuery->whereAdd(Role::ID_ROLE, $this->getRole()->getIdRole());
			$this->availableActions = $actionQuery->find();
		}
		return $this->availableActions;
	}
	
	private function getMenuItems()
	{
		$menuItemQuery = new MenuItemQuery($this->adapter);
		$menuItemQuery->whereAdd(MenuItem::STATUS, MenuItem::ENABLE);
		$menuItemQuery->addAscendingOrderBy(MenuItem::ORDER);
		$menuItems = $menuItemQuery->find();
		$this->menuItems = $menuItems;
	}
	
	private function getHtml()
	{
		$html = '';
		if($this->menuItems instanceof MenuItemCollection == false)
			$this->getMenuItems();
		
		$controllerQuery = new ControllerQuery($this->adapter);
		$actionQuery = new ActionQuery($this->adapter);
		
		$actions = $actionQuery->whereAdd(Action::ID_ACTION, $this->getAvailableActions()->getPrimaryKeys(), ActionQuery::IN )->find();
		$controllers = $controllerQuery->whereAdd(Controller::ID_CONTROLLER, $actions->getControllerIds(), ControllerQuery::IN)->find();
		
		$menuItemsParents = $this->getParents();
		foreach ($menuItemsParents as $menuItem)
		{
			/* @var $menuItem MenuItem */
			$childs = $this->menuItems->getByIdParent($menuItem->getIdMenuItem());
			if(!$childs->isEmpty())
			{
				$dropDown = '<li class="dropdown">';
				$dropDown .= '<a href="#" class="dropdown-toggle" data-toggle="dropdown">' . $menuItem->getName() . ' <b class="caret"></b></a>';
				$dropDown .= '<ul class="dropdown-menu">';
				$hasLinks = false;
				/* @var $child MenuItem */
				foreach ($childs as $child)
				{
					/* @var $action Action */
					$action = $actions->getByPK($child->getIdAction());
					if($action instanceof Action)
					{
						$controller = $controllers->getByPK($action->getIdController());
							
						$path = str_replace("controller", "", $controller->getName()) . "/" . str_replace("-action", "", $action->getName());
						$path = str_replace("\\", "/", $path);
						$path = str_replace("//", "/", $path);
						$path = str_replace("-/", "/", $path);
						$path = $this->getUnderscore($path);
						$dropDown .= '<li><a href="' . $this->baseUrl . '/' . $path . '">' . $child->getName() . '</a></li>';
						$hasLinks = true;
					}
					
				}
				$dropDown .= '</ul>';
				$dropDown .= '</li>';
				if($hasLinks)
					$html .= $dropDown;
			}else{
				$html .= '<li><a href="' . $this->baseUrl . '">' . $menuItem->getName() . '</a></li>';
			}
		}
		
		return  $html;
	}
	
	public function render()
	{
		$html = '';
		$html .= '<div class="collapse navbar-collapse">';
		$html .= '<ul class="nav navbar-nav">';
		$html .= $this->getHtml();
		$html .= '</ul>';
		$html .= $this->getUserMenu();
		$html .= '</div>';
		
		return $html;
	}
	
	private function getUserMenu()
	{
		$html = '';
		$html .= '<ul class="nav navbar-nav navbar-right">';
		$html .= '<li class="dropdown">';
			$html .= '<a href="#" class="dropdown-toggle" data-toggle="dropdown">' . $this->user->getFullName(). ' <b class="caret"></b></a>';
			$html .= '<ul class="dropdown-menu">';
				$html .= '<li><a href="'. $this->baseUrl. '/core/auth/login">LogOut</a></li>';
			$html .= '</ul>';
		$html .= '</li>';
		$html .= '</ul>';
		
		return $html;
	}
	
	
}
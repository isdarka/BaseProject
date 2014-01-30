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
use Core\Query\FileQuery;
use Core\Model\Bean\File;
use Core\Helper\File\Upload;
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
		$fileQuery = new FileQuery($this->adapter);
		$file = $fileQuery->findByPK($this->user->getIdFile());
		if($file instanceof File == false)
		{
			$file = new File();
			$file->setName('no_image.png');
		}
			
		$file->setPath(Upload::$publicDestinations[Upload::AVATAR]);
		
		$html = '';
		$html .= '<ul class="nav navbar-nav navbar-right">';
		$html .= '<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" id="notification" href="#"><i class="fa fa-exclamation-triangle fa-lg"></i> <span class="badge"></span> <b class="caret"></b></a>';
		$html .= '<ul class="dropdown-menu msnNotifications" >';
		$html .= '<li role="presentation" class="dropdown-header"><a>You have 9 new notifications</a></li>';
		$html .= '<li role="presentation" class="divider"></li>';
// 		$html .= '<li>
// 				<div class="row">
// 					<div class="col-sm-4 text-center">
// 						<img  src="'. $this->baseUrl. '/' . $file->getPath() .'/' . $file->getName() . '" width="50">
// 					</div>	
// 					<div class="col-sm-8">
// 						asdasd asdas asd asdassasdasd asd
// 					</div>
// 				</div>
// 				</li>';
		$html .= '</ul>';
		$html .= '</li>';
		$html .= '<li><a class="dropdown-toggle" data-toggle="dropdown" id="newMessage" href="#"><i class="fa fa-envelope-o fa-lg"></i></a></li>';
		
		$html .= '<li class="dropdown"><a href="#" class="dropdown-toggle gear" data-toggle="dropdown" >' . $this->user->getFullName(). '  <i class="fa fa-cog fa-lg"></i> <b class="caret"></b></a>';
		$html .= '<ul class="dropdown-menu">';
		$html .= '<li class="text-center"><img  src="'. $this->baseUrl. '/' . $file->getPath() .'/' . $file->getName() . '" width="50"></li>';
// 		$html .= '<li role="presentation" class="dropdown-header">You have 9 new notifications</li>';
		$html .= '<li role="presentation" class="divider"></li>';
		$html .= '<li><a href="'. $this->baseUrl. '/core/user/profile"><i class="fa fa-user"></i> Profile</a></li>';
		$html .= '<li><a href="'. $this->baseUrl. '/core/message/my-messages"><i class="fa fa-envelope-o"></i> Messages</a></li>';
		$html .= '<li><a href="'. $this->baseUrl. '/core/user/change-password"><i class="fa fa-key"></i> Change Password</a></li>';
		$html .= '<li role="presentation" class="divider"></li>';
		$html .= '<li><a href="'. $this->baseUrl. '/core/auth/login"><i class="fa fa-power-off"></i> LogOut</a></li>';
		$html .= '</ul>';
		$html .= '</li>';

		
		
		
		
// 		$html .= '<li class="dropdown">';
// 			$html .= '<a href="#" class="dropdown-toggle" data-toggle="dropdown">' . $this->user->getFullName(). ' <b class="caret"></b></a>';
// 			$html .= '<ul class="dropdown-menu">';
// 				$html .= '<li><a href="'. $this->baseUrl. '/core/auth/login">LogOut</a></li>';
// 				$html .= '<li><a href="'. $this->baseUrl. '/core/user/change-password">Change Password</a></li>';
				
// 			$html .= '</ul>';
// 		$html .= '</li>';
		$html .= '</ul>';
		
		return $html;
	}
	
	
}
<?php
use BaseProject\Security\AuthStorage;
use BaseProject\Security\Acl;
use Core\Model\Bean\User;
/**
 *
 * @category   Smarty
 * @package    Smarty_Plugins
 * @copyright  ##$COPYRIGHT$##
 * @author     IsdarkA
 * @version    1.0
 */

/**
 *
 * @param string $resource
 * @return boolean
 */
function smarty_modifier_isAllowed($resource)
{
	$authStorage = new AuthStorage();
	$authStorage = $authStorage->read();
	/* @var $acl Acl */
	$acl = $authStorage["acl"];
	
	if($acl instanceof Acl == false)
		return false;
	
	/* @var $user User */
	$user = $authStorage["user"];
	
	if(!$acl->hasResource($resource))
		return false;
	
	return $acl->isAllowed($user->getIdRole(), $resource);
}
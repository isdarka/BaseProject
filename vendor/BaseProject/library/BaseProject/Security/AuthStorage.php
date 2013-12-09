<?php
/**
 *
 * @author isdarka
 * @created Dec 8, 2013 8:52:06 PM
 */

namespace BaseProject\Security;

use Zend\Authentication\Storage\Session;
class AuthStorage extends Session
{
	public function setRememberMe($rememberMe = 0, $time = 1209600)
	{
		if ($rememberMe == 1) {
			$this->session->getManager()->rememberMe($time);
		}
	}
	 
	public function forgetMe()
	{
		$this->session->getManager()->forgetMe();
	}
}
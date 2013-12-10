<?php

/**
 *
 * ActionCatalog
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Catalog
 * @copyright 
 * @license 
 * @created Mon Dec 9 11:15:21 2013
 * @version 1.0
 */

namespace Core\Model\Catalog;

use Model\Bean\AbstractBean;
use Core\Model\Metadata\ActionMetadata;
use Core\Model\Exception\ActionException;
use Zend\Db\Sql\Where;
use Model\Catalog\AbstractCatalog;

class ActionCatalog extends AbstractCatalog
{

		
 	/**
 	 *
 	 * Get ActionMetadata
 	 *
 	 * @return ActionMetadata
 	 */
	public function getMetadata() 
	{
		return new ActionMetadata();
	}
	
	public function linkToRole($idAction, $idRole)
	{
		$this->insert = $this->sql->insert("core_actions_roles");
		$this->insert->values(array(
				"id_action" => $idAction,
				"id_role" => $idRole,
			));
		var_dump($this->toSql());
		die();
// 		$this->execute($this->insert);
	}
}
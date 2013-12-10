<?php

/**
 *
 * RoleCatalog
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
use Core\Model\Metadata\RoleMetadata;
use Core\Model\Exception\RoleException;
use Zend\Db\Sql\Where;
use Model\Catalog\AbstractCatalog;

class RoleCatalog extends AbstractCatalog
{

		
 	/**
 	 *
 	 * Get RoleMetadata
 	 *
 	 * @return RoleMetadata
 	 */
	public function getMetadata() 
	{
		return new RoleMetadata();
	}
		
 	/**
 	 *
 	 * Link to Action
 	 *
 	 */
	public function linkToAction($idAction, $idRole) 
	{
		try {
			$this->insert = $this->sql->insert('core_actions_roles');
			$this->insert->values(array(
				'id_action' => $idAction,
				'id_role' => $idRole,
			));
			$this->execute($this->insert);
		}catch (\Zend\Db\Exception\ExceptionInterface $e) {
			throw $e;
		} catch (\Exception $e) {
			throw $e;
		}
	}
		
 	/**
 	 *
 	 * Unlink from Role
 	 *
 	 */
	public function unlinkFromAction($idAction, $idRole) 
	{
		try {
			$this->delete = $this->sql->delete('core_actions_roles');
			$where = new Where();
			$where->equalTo('id_action', $idAction);
			$where->equalTo('id_role', $idRole);
			$this->delete->where($where);
			$this->execute($this->delete);
		}catch (\Zend\Db\Exception\ExceptionInterface $e) {
			throw $e;
		} catch (\Exception $e) {
			throw $e;
		}
	}
		
 	/**
 	 *
 	 * Unlink all Role
 	 *
 	 */
	public function unlinkAllAction($idRole) 
	{
		try {
			$this->delete = $this->sql->delete('core_actions_roles');
			$where = new Where();
			$where->equalTo('id_role', $idRole);
			$this->delete->where($where);
			$this->execute($this->delete);
		}catch (\Zend\Db\Exception\ExceptionInterface $e) {
			throw $e;
		} catch (\Exception $e) {
			throw $e;
		}
	}
}
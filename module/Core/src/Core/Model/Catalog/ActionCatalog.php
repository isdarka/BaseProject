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
 * @created Tue Dec 10 18:47:23 2013
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
		
 	/**
 	 *
 	 * Link to Role
 	 *
 	 */
	public function linkToRole($idAction, $idRole) 
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
 	 * Unlink from Action
 	 *
 	 */
	public function unlinkFromRole($idAction, $idRole) 
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
 	 * Unlink all Action
 	 *
 	 */
	public function unlinkAllRole($idRole) 
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
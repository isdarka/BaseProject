<?php

/**
 *
 * EmailCatalog
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Catalog
 * @copyright 
 * @license 
 * @created Wed Dec 11 09:36:19 2013
 * @version 1.0
 */

namespace Core\Model\Catalog;

use Model\Bean\AbstractBean;
use Core\Model\Metadata\EmailMetadata;
use Core\Model\Exception\EmailException;
use Zend\Db\Sql\Where;
use Model\Catalog\AbstractCatalog;

class EmailCatalog extends AbstractCatalog
{

		
 	/**
 	 *
 	 * Get EmailMetadata
 	 *
 	 * @return EmailMetadata
 	 */
	public function getMetadata() 
	{
		return new EmailMetadata();
	}
		
 	/**
 	 *
 	 * Link to Person
 	 *
 	 */
	public function linkToPerson($idPerson, $idEmail) 
	{
		try {
			$this->insert = $this->sql->insert('common_persons_emails');
			$this->insert->values(array(
				'id_person' => $idPerson,
				'id_email' => $idEmail,
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
 	 * Unlink from Email
 	 *
 	 */
	public function unlinkFromPerson($idPerson, $idEmail) 
	{
		try {
			$this->delete = $this->sql->delete('common_persons_emails');
			$where = new Where();
			$where->equalTo('id_person', $idPerson);
			$where->equalTo('id_email', $idEmail);
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
 	 * Unlink all Email
 	 *
 	 */
	public function unlinkAllPerson($idEmail) 
	{
		try {
			$this->delete = $this->sql->delete('common_persons_emails');
			$where = new Where();
			$where->equalTo('id_email', $idEmail);
			$this->delete->where($where);
			$this->execute($this->delete);
		}catch (\Zend\Db\Exception\ExceptionInterface $e) {
			throw $e;
		} catch (\Exception $e) {
			throw $e;
		}
	}
}
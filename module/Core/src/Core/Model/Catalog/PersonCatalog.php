<?php

/**
 *
 * PersonCatalog
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
use Core\Model\Metadata\PersonMetadata;
use Core\Model\Exception\PersonException;
use Zend\Db\Sql\Where;
use Model\Catalog\AbstractCatalog;

class PersonCatalog extends AbstractCatalog
{

		
 	/**
 	 *
 	 * Get PersonMetadata
 	 *
 	 * @return PersonMetadata
 	 */
	public function getMetadata() 
	{
		return new PersonMetadata();
	}
		
 	/**
 	 *
 	 * Create Person
 	 *
 	 */
	protected function create(AbstractBean $bean) 
	{
		try {
			$this->insert = $this->sql->insert(self::getMetadata()->getTableName());
			$data = self::getMetadata()->toCreateArray($bean);
			$data = array_filter($data, array($this, 'isNotNull'));
			$this->insert->values($data);
			$this->execute($this->insert);
			$this->getMetadata()->getFactory()->populate($bean, array(
				self::getMetadata()->getPrimaryKey() => $this->getLastInsertId(),
			));
		} catch (\Zend\Db\Exception\ExceptionInterface $e) {
			throw $e;
		} catch (PersonException $e) {
			throw $e;
		}
	}
		
 	/**
 	 *
 	 * Update Person
 	 *
 	 */
	protected function update(AbstractBean $bean) 
	{
		try {
			$this->update = $this->sql->update(self::getMetadata()->getTableName());
			$data = self::getMetadata()->toUpdateArray($bean);
			$data = array_filter($data, array($this, 'isNotNull'));
			$this->update->set($data);
			$where = new Where();
			$where->equalTo(self::getMetadata()->getPrimaryKey(), $bean->getIdPerson());
			$this->update->where($where);
			$this->execute($this->update);
		} catch (\Zend\Db\Exception\ExceptionInterface $e) {
			throw $e;
		} catch (PersonException $e) {
			throw $e;
		}
	}
		
 	/**
 	 *
 	 * Link to Phonenumber
 	 *
 	 */
	public function linkToPhonenumber($idPerson, $idPhoneNumber) 
	{
		try {
			$this->insert = $this->sql->insert('common_persons_phone_numbers');
			$this->insert->values(array(
				'id_person' => $idPerson,
				'id_phone_number' => $idPhoneNumber,
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
 	 * Unlink from Person
 	 *
 	 */
	public function unlinkFromPhonenumber($idPerson, $idPhoneNumber) 
	{
		try {
			$this->delete = $this->sql->delete('common_persons_phone_numbers');
			$where = new Where();
			$where->equalTo('id_person', $idPerson);
			$where->equalTo('id_phone_number', $idPhoneNumber);
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
 	 * Unlink all Person
 	 *
 	 */
	public function unlinkAllPhonenumber($idPhoneNumber) 
	{
		try {
			$this->delete = $this->sql->delete('common_persons_phone_numbers');
			$where = new Where();
			$where->equalTo('id_phone_number', $idPhoneNumber);
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
 	 * Link to Email
 	 *
 	 */
	public function linkToEmail($idPerson, $idEmail) 
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
 	 * Unlink from Person
 	 *
 	 */
	public function unlinkFromEmail($idPerson, $idEmail) 
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
 	 * Unlink all Person
 	 *
 	 */
	public function unlinkAllEmail($idEmail) 
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
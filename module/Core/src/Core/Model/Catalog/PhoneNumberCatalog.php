<?php

/**
 *
 * PhoneNumberCatalog
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Catalog
 * @copyright 
 * @license 
 * @created Wed Dec 11 09:30:39 2013
 * @version 1.0
 */

namespace Core\Model\Catalog;

use Model\Bean\AbstractBean;
use Core\Model\Metadata\PhoneNumberMetadata;
use Core\Model\Exception\PhoneNumberException;
use Zend\Db\Sql\Where;
use Model\Catalog\AbstractCatalog;

class PhoneNumberCatalog extends AbstractCatalog
{

		
 	/**
 	 *
 	 * Get PhoneNumberMetadata
 	 *
 	 * @return PhoneNumberMetadata
 	 */
	public function getMetadata() 
	{
		return new PhoneNumberMetadata();
	}
		
 	/**
 	 *
 	 * Link to Person
 	 *
 	 */
	public function linkToPerson($idPerson, $idPhoneNumber) 
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
 	 * Unlink from PhoneNumber
 	 *
 	 */
	public function unlinkFromPerson($idPerson, $idPhoneNumber) 
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
 	 * Unlink all PhoneNumber
 	 *
 	 */
	public function unlinkAllPerson($idPhoneNumber) 
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
}
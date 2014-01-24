<?php

/**
 *
 * MexicoZipCodeBean
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Metadata
 * @copyright 
 * @license 
 * @created Fri Dec 13 09:35:16 2013
 * @version 1.0
 */

namespace Core\Model\Metadata;

use Model\Bean\AbstractBean;
use Model\Metadata\AbstractMetadata;
use Core\Model\Bean\MexicoZipCode;
use Core\Model\Factory\MexicoZipCodeFactory;
use Core\Model\Collection\MexicoZipCodeCollection;

class MexicoZipCodeMetadata extends AbstractMetadata
{

		
 	/**
 	 *
 	 * toUpdateArray
 	 *
 	 */
	public function toUpdateArray(AbstractBean $bean) 
	{
		return $bean->toArrayFor(
			array(
				MexicoZipCode::D_CODIGO,
				MexicoZipCode::D_ASENTA,
				MexicoZipCode::D_TIPO_ASENTA,
				MexicoZipCode::D_MNPIO,
				MexicoZipCode::D_ESTADO,
				MexicoZipCode::D_CIUDAD,
				MexicoZipCode::D_CP,
				MexicoZipCode::C_ESTADO,
				MexicoZipCode::C_OFICINA,
				MexicoZipCode::C_CP,
				MexicoZipCode::C_TIPO_ASENTA,
				MexicoZipCode::C_MNPIO,
				MexicoZipCode::ID_ASENTA_CPCONS,
				MexicoZipCode::D_ZONA,
				MexicoZipCode::C_CVE_CIUDAD,
			)
		);
	}
		
 	/**
 	 *
 	 * toCreateArray
 	 *
 	 */
	public function toCreateArray(AbstractBean $bean) 
	{
		return $bean->toArrayFor(
			array(
				MexicoZipCode::ID_MEXICO_ZIP_CODE,
				MexicoZipCode::D_CODIGO,
				MexicoZipCode::D_ASENTA,
				MexicoZipCode::D_TIPO_ASENTA,
				MexicoZipCode::D_MNPIO,
				MexicoZipCode::D_ESTADO,
				MexicoZipCode::D_CIUDAD,
				MexicoZipCode::D_CP,
				MexicoZipCode::C_ESTADO,
				MexicoZipCode::C_OFICINA,
				MexicoZipCode::C_CP,
				MexicoZipCode::C_TIPO_ASENTA,
				MexicoZipCode::C_MNPIO,
				MexicoZipCode::ID_ASENTA_CPCONS,
				MexicoZipCode::D_ZONA,
				MexicoZipCode::C_CVE_CIUDAD,
			)
		);
	}
		
 	/**
 	 *
 	 * Get fields
 	 *
 	 */
	public function getFields() 
	{
		return array(
			MexicoZipCode::ID_MEXICO_ZIP_CODE,
			MexicoZipCode::D_CODIGO,
			MexicoZipCode::D_ASENTA,
			MexicoZipCode::D_TIPO_ASENTA,
			MexicoZipCode::D_MNPIO,
			MexicoZipCode::D_ESTADO,
			MexicoZipCode::D_CIUDAD,
			MexicoZipCode::D_CP,
			MexicoZipCode::C_ESTADO,
			MexicoZipCode::C_OFICINA,
			MexicoZipCode::C_CP,
			MexicoZipCode::C_TIPO_ASENTA,
			MexicoZipCode::C_MNPIO,
			MexicoZipCode::ID_ASENTA_CPCONS,
			MexicoZipCode::D_ZONA,
			MexicoZipCode::C_CVE_CIUDAD,
		);
	}
		
 	/**
 	 *
 	 * Get Entity Name
 	 *
 	 * @return string
 	 */
	public function getEntityName() 
	{
		return "MexicoZipCode";
	}
		
 	/**
 	 *
 	 * Get TableName
 	 *
 	 * @return string
 	 */
	public function getTableName() 
	{
		return "common_mexico_zip_codes";
	}
		
 	/**
 	 *
 	 * Get PrimaryKey
 	 *
 	 * @return string
 	 */
	public function getPrimaryKey() 
	{
		return "id_mexico_zip_code";
	}
		
 	/**
 	 *
 	 * Get Factory
 	 *
 	 * @return MexicoZipCodeFactory
 	 */
	public function getFactory() 
	{
		static $factory = null;
		if( null == $factory ){
			$factory = new MexicoZipCodeFactory();
		}
		return $factory;
	}
		
 	/**
 	 *
 	 * Get Collection
 	 *
 	 * @return MexicoZipCodeCollection
 	 */
	public function newCollection() 
	{
		return new MexicoZipCodeCollection();
	}
		
 	/**
 	 *
 	 * Get Bean
 	 *
 	 * @return MexicoZipCode
 	 */
	public function newBean() 
	{
		return new MexicoZipCode();
	}
}
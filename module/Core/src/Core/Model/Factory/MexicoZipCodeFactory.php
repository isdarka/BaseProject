<?php

/**
 *
 * MexicoZipCodeBean
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Factory
 * @copyright 
 * @license 
 * @created Fri Dec 20 17:00:49 2013
 * @version 1.0
 */

namespace Core\Model\Factory;

use Core\Model\Bean\MexicoZipCode;
use Model\Factory\AbstractFactory;
use Core\Model\Exception\MexicoZipCodeException;

class MexicoZipCodeFactory extends AbstractFactory
{

		
 	/**
 	 *
 	 * Create MexicoZipCode from array
 	 *
 	 * @return MexicoZipCode
 	 */
	public static  function createFromArray($fields) 
	{
		$mexicoZipCode = new MexicoZipCode();
		self::populate($mexicoZipCode,$fields);
		return $mexicoZipCode;
	}
		
 	/**
 	 *
 	 * Populate MexicoZipCode
 	 *
 	 */
	public static  function populate($mexicoZipCode, $fields) 
	{
		if(!($mexicoZipCode instanceof MexicoZipCode))
			throw new MexicoZipCodeException('$mexicoZipCode must be instance of MexicoZipCode');
		
		if($fields instanceof \stdClass)
		{
			$factory = self::getInstance();
			$stdClass = clone $fields;
			$fields = array();
			foreach ($stdClass as $key => $value)
				$fields[$factory->getUnderscore($key)] = $value;
		}
		
		if(isset($fields[MexicoZipCode::ID_MEXICO_ZIP_CODE])){
			$mexicoZipCode->setIdMexicoZipCode($fields[MexicoZipCode::ID_MEXICO_ZIP_CODE]);
		}
		
		if(isset($fields[MexicoZipCode::D_CODIGO])){
			$mexicoZipCode->setDCodigo($fields[MexicoZipCode::D_CODIGO]);
		}
		
		if(isset($fields[MexicoZipCode::D_ASENTA]) && !empty($fields[MexicoZipCode::D_ASENTA])){
			$mexicoZipCode->setDAsenta($fields[MexicoZipCode::D_ASENTA]);
		}
		
		if(isset($fields[MexicoZipCode::D_TIPO_ASENTA]) && !empty($fields[MexicoZipCode::D_TIPO_ASENTA])){
			$mexicoZipCode->setDTipoAsenta($fields[MexicoZipCode::D_TIPO_ASENTA]);
		}
		
		if(isset($fields[MexicoZipCode::D_MNPIO]) && !empty($fields[MexicoZipCode::D_MNPIO])){
			$mexicoZipCode->setDMnpio($fields[MexicoZipCode::D_MNPIO]);
		}
		
		if(isset($fields[MexicoZipCode::D_ESTADO]) && !empty($fields[MexicoZipCode::D_ESTADO])){
			$mexicoZipCode->setDEstado($fields[MexicoZipCode::D_ESTADO]);
		}
		
		if(isset($fields[MexicoZipCode::D_CIUDAD]) && !empty($fields[MexicoZipCode::D_CIUDAD])){
			$mexicoZipCode->setDCiudad($fields[MexicoZipCode::D_CIUDAD]);
		}
		
		if(isset($fields[MexicoZipCode::D_CP]) && !empty($fields[MexicoZipCode::D_CP])){
			$mexicoZipCode->setDCP($fields[MexicoZipCode::D_CP]);
		}
		
		if(isset($fields[MexicoZipCode::C_ESTADO]) && !empty($fields[MexicoZipCode::C_ESTADO])){
			$mexicoZipCode->setCEstado($fields[MexicoZipCode::C_ESTADO]);
		}
		
		if(isset($fields[MexicoZipCode::C_OFICINA]) && !empty($fields[MexicoZipCode::C_OFICINA])){
			$mexicoZipCode->setCOficina($fields[MexicoZipCode::C_OFICINA]);
		}
		
		if(isset($fields[MexicoZipCode::C_CP]) && !empty($fields[MexicoZipCode::C_CP])){
			$mexicoZipCode->setCCP($fields[MexicoZipCode::C_CP]);
		}
		
		if(isset($fields[MexicoZipCode::C_TIPO_ASENTA]) && !empty($fields[MexicoZipCode::C_TIPO_ASENTA])){
			$mexicoZipCode->setCTipoAsenta($fields[MexicoZipCode::C_TIPO_ASENTA]);
		}
		
		if(isset($fields[MexicoZipCode::C_MNPIO]) && !empty($fields[MexicoZipCode::C_MNPIO])){
			$mexicoZipCode->setCMnpio($fields[MexicoZipCode::C_MNPIO]);
		}
		
		if(isset($fields[MexicoZipCode::ID_ASENTA_CPCONS]) && !empty($fields[MexicoZipCode::ID_ASENTA_CPCONS])){
			$mexicoZipCode->setIdAsentaCpcons($fields[MexicoZipCode::ID_ASENTA_CPCONS]);
		}
		
		if(isset($fields[MexicoZipCode::D_ZONA]) && !empty($fields[MexicoZipCode::D_ZONA])){
			$mexicoZipCode->setDZona($fields[MexicoZipCode::D_ZONA]);
		}
		
		if(isset($fields[MexicoZipCode::C_CVE_CIUDAD]) && !empty($fields[MexicoZipCode::C_CVE_CIUDAD])){
			$mexicoZipCode->setCCveCiudad($fields[MexicoZipCode::C_CVE_CIUDAD]);
		}
		
	}
}
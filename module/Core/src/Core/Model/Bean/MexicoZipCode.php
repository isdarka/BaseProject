<?php

/**
 *
 * MexicoZipCodeBean
 * 
 * GeCo
 * 
 * @autor isdarka
 * @category Model
 * @package Bean
 * @copyright 
 * @license 
 * @created Fri Dec 13 09:35:16 2013
 * @version 1.0
 */

namespace Core\Model\Bean;

use Model\Bean\AbstractBean;

class MexicoZipCode extends AbstractBean
{

	const TABLENAME = 'common_mexico_zip_codes';

	const ID_MEXICO_ZIP_CODE = 'id_mexico_zip_code';

	const D_CODIGO = 'd_codigo';

	const D_ASENTA = 'd_asenta';

	const D_TIPO_ASENTA = 'd_tipo_asenta';

	const D_MNPIO = 'D_mnpio';

	const D_ESTADO = 'd_estado';

	const D_CIUDAD = 'd_ciudad';

	const D_CP = 'd_CP';

	const C_ESTADO = 'c_estado';

	const C_OFICINA = 'c_oficina';

	const C_CP = 'c_CP';

	const C_TIPO_ASENTA = 'c_tipo_asenta';

	const C_MNPIO = 'c_mnpio';

	const ID_ASENTA_CPCONS = 'id_asenta_cpcons';

	const D_ZONA = 'd_zona';

	const C_CVE_CIUDAD = 'c_cve_ciudad';

	private $idMexicoZipCode;

	private $dCodigo;

	private $dAsenta;

	private $dTipoAsenta;

	private $dMnpio;

	private $dEstado;

	private $dCiudad;

	private $dCP;

	private $cEstado;

	private $cOficina;

	private $cCP;

	private $cTipoAsenta;

	private $cMnpio;

	private $idAsentaCpcons;

	private $dZona;

	private $cCveCiudad;

		
 	/**
 	 *
 	 * Get the idMexicoZipCode property
 	 *
 	 * @return int $idMexicoZipCode
 	 */
	public function getIndex() 
	{
		return $this->idMexicoZipCode;
	}
		
 	/**
 	 *
 	 * Set the idMexicoZipCode property
 	 *
 	 * @param int $idMexicoZipCode
 	 */
	public function setIdMexicoZipCode($idMexicoZipCode) 
	{
		$this->idMexicoZipCode = $idMexicoZipCode;
		return $this;
	}
		
 	/**
 	 *
 	 * Set the dCodigo property
 	 *
 	 * @param int $dCodigo
 	 */
	public function setDCodigo($dCodigo) 
	{
		$this->dCodigo = $dCodigo;
		return $this;
	}
		
 	/**
 	 *
 	 * Set the dAsenta property
 	 *
 	 * @param string $dAsenta
 	 */
	public function setDAsenta($dAsenta) 
	{
		$this->dAsenta = $dAsenta;
		return $this;
	}
		
 	/**
 	 *
 	 * Set the dTipoAsenta property
 	 *
 	 * @param string $dTipoAsenta
 	 */
	public function setDTipoAsenta($dTipoAsenta) 
	{
		$this->dTipoAsenta = $dTipoAsenta;
		return $this;
	}
		
 	/**
 	 *
 	 * Set the dMnpio property
 	 *
 	 * @param string $dMnpio
 	 */
	public function setDMnpio($dMnpio) 
	{
		$this->dMnpio = $dMnpio;
		return $this;
	}
		
 	/**
 	 *
 	 * Set the dEstado property
 	 *
 	 * @param string $dEstado
 	 */
	public function setDEstado($dEstado) 
	{
		$this->dEstado = $dEstado;
		return $this;
	}
		
 	/**
 	 *
 	 * Set the dCiudad property
 	 *
 	 * @param string $dCiudad
 	 */
	public function setDCiudad($dCiudad) 
	{
		$this->dCiudad = $dCiudad;
		return $this;
	}
		
 	/**
 	 *
 	 * Set the dCP property
 	 *
 	 * @param int $dCP
 	 */
	public function setDCP($dCP) 
	{
		$this->dCP = $dCP;
		return $this;
	}
		
 	/**
 	 *
 	 * Set the cEstado property
 	 *
 	 * @param int $cEstado
 	 */
	public function setCEstado($cEstado) 
	{
		$this->cEstado = $cEstado;
		return $this;
	}
		
 	/**
 	 *
 	 * Set the cOficina property
 	 *
 	 * @param int $cOficina
 	 */
	public function setCOficina($cOficina) 
	{
		$this->cOficina = $cOficina;
		return $this;
	}
		
 	/**
 	 *
 	 * Set the cCP property
 	 *
 	 * @param string $cCP
 	 */
	public function setCCP($cCP) 
	{
		$this->cCP = $cCP;
		return $this;
	}
		
 	/**
 	 *
 	 * Set the cTipoAsenta property
 	 *
 	 * @param int $cTipoAsenta
 	 */
	public function setCTipoAsenta($cTipoAsenta) 
	{
		$this->cTipoAsenta = $cTipoAsenta;
		return $this;
	}
		
 	/**
 	 *
 	 * Set the cMnpio property
 	 *
 	 * @param int $cMnpio
 	 */
	public function setCMnpio($cMnpio) 
	{
		$this->cMnpio = $cMnpio;
		return $this;
	}
		
 	/**
 	 *
 	 * Set the idAsentaCpcons property
 	 *
 	 * @param int $idAsentaCpcons
 	 */
	public function setIdAsentaCpcons($idAsentaCpcons) 
	{
		$this->idAsentaCpcons = $idAsentaCpcons;
		return $this;
	}
		
 	/**
 	 *
 	 * Set the dZona property
 	 *
 	 * @param string $dZona
 	 */
	public function setDZona($dZona) 
	{
		$this->dZona = $dZona;
		return $this;
	}
		
 	/**
 	 *
 	 * Set the cCveCiudad property
 	 *
 	 * @param int $cCveCiudad
 	 */
	public function setCCveCiudad($cCveCiudad) 
	{
		$this->cCveCiudad = $cCveCiudad;
		return $this;
	}
		
 	/**
 	 *
 	 * Get the idMexicoZipCode property
 	 *
 	 * @return int $idMexicoZipCode
 	 */
	public function getIdMexicoZipCode() 
	{
		return $this->idMexicoZipCode;
	}
		
 	/**
 	 *
 	 * Get the dCodigo property
 	 *
 	 * @return int $dCodigo
 	 */
	public function getDCodigo() 
	{
		return $this->dCodigo;
	}
		
 	/**
 	 *
 	 * Get the dAsenta property
 	 *
 	 * @return string $dAsenta
 	 */
	public function getDAsenta() 
	{
		return $this->dAsenta;
	}
		
 	/**
 	 *
 	 * Get the dTipoAsenta property
 	 *
 	 * @return string $dTipoAsenta
 	 */
	public function getDTipoAsenta() 
	{
		return $this->dTipoAsenta;
	}
		
 	/**
 	 *
 	 * Get the dMnpio property
 	 *
 	 * @return string $dMnpio
 	 */
	public function getDMnpio() 
	{
		return $this->dMnpio;
	}
		
 	/**
 	 *
 	 * Get the dEstado property
 	 *
 	 * @return string $dEstado
 	 */
	public function getDEstado() 
	{
		return $this->dEstado;
	}
		
 	/**
 	 *
 	 * Get the dCiudad property
 	 *
 	 * @return string $dCiudad
 	 */
	public function getDCiudad() 
	{
		return $this->dCiudad;
	}
		
 	/**
 	 *
 	 * Get the dCP property
 	 *
 	 * @return int $dCP
 	 */
	public function getDCP() 
	{
		return $this->dCP;
	}
		
 	/**
 	 *
 	 * Get the cEstado property
 	 *
 	 * @return int $cEstado
 	 */
	public function getCEstado() 
	{
		return $this->cEstado;
	}
		
 	/**
 	 *
 	 * Get the cOficina property
 	 *
 	 * @return int $cOficina
 	 */
	public function getCOficina() 
	{
		return $this->cOficina;
	}
		
 	/**
 	 *
 	 * Get the cCP property
 	 *
 	 * @return string $cCP
 	 */
	public function getCCP() 
	{
		return $this->cCP;
	}
		
 	/**
 	 *
 	 * Get the cTipoAsenta property
 	 *
 	 * @return int $cTipoAsenta
 	 */
	public function getCTipoAsenta() 
	{
		return $this->cTipoAsenta;
	}
		
 	/**
 	 *
 	 * Get the cMnpio property
 	 *
 	 * @return int $cMnpio
 	 */
	public function getCMnpio() 
	{
		return $this->cMnpio;
	}
		
 	/**
 	 *
 	 * Get the idAsentaCpcons property
 	 *
 	 * @return int $idAsentaCpcons
 	 */
	public function getIdAsentaCpcons() 
	{
		return $this->idAsentaCpcons;
	}
		
 	/**
 	 *
 	 * Get the dZona property
 	 *
 	 * @return string $dZona
 	 */
	public function getDZona() 
	{
		return $this->dZona;
	}
		
 	/**
 	 *
 	 * Get the cCveCiudad property
 	 *
 	 * @return int $cCveCiudad
 	 */
	public function getCCveCiudad() 
	{
		return $this->cCveCiudad;
	}
		
 	/**
 	 *
 	 * Get the Array
 	 *
 	 * @return array
 	 */
	public function toArray() 
	{
		$array = array(
			self::ID_MEXICO_ZIP_CODE => $this->getIdMexicoZipCode(),
			self::D_CODIGO => $this->getDCodigo(),
			self::D_ASENTA => $this->getDAsenta(),
			self::D_TIPO_ASENTA => $this->getDTipoAsenta(),
			self::D_MNPIO => $this->getDMnpio(),
			self::D_ESTADO => $this->getDEstado(),
			self::D_CIUDAD => $this->getDCiudad(),
			self::D_CP => $this->getDCP(),
			self::C_ESTADO => $this->getCEstado(),
			self::C_OFICINA => $this->getCOficina(),
			self::C_CP => $this->getCCP(),
			self::C_TIPO_ASENTA => $this->getCTipoAsenta(),
			self::C_MNPIO => $this->getCMnpio(),
			self::ID_ASENTA_CPCONS => $this->getIdAsentaCpcons(),
			self::D_ZONA => $this->getDZona(),
			self::C_CVE_CIUDAD => $this->getCCveCiudad(),
		);
		return $array;
	}
}
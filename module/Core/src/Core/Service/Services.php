<?php

namespace Core\Service;


class Services
{
	/**
	 * @param float $a
	 * @return string
	 */
	public function suma($a, $b)
	{
		return "Prueba";
	}
	
	/**
	 * 
	 * @param string $name
	 * @return string
	 */
	public function helloWorld($name)
	{
// 		throw new \SoapFault("asda", 11111);
		return "Hello " . (string) $name;
	}
}
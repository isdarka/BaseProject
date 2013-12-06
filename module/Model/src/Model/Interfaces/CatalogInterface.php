<?php
/**
 *
 * @author isdarka
 * @created Nov 23, 2013 10:33:29 AM
 */

namespace Model\Interfaces;

use Model\Bean\AbstractBean;
interface CatalogInterface
{
	public function save(AbstractBean $bean);
	
// 	protected function create($bean);
	
// 	private function update($bean);
}
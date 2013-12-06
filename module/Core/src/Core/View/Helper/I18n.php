<?php
/**
 *
 * @author isdarka
 * @created Oct 18, 2013 4:49:17 PM
 */
namespace Core\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\Mvc\I18n\Translator;
class I18n extends AbstractHelper
{
	protected $request;
	
	public function __construct(Translator $request)
	{
		$this->request = $request;
	}
	
	public function __invoke($message)
	{
		return $this->request->translate($message);
	}
}
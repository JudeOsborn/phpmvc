<?php

/**
Render a view, creating a scope for variables in the view (i.e. $this->whatever).
*/
class View extends ArrayObject
{
	public function __construct()
	{
		parent::__construct(array(), ArrayObject::ARRAY_AS_PROPS);
	}

	public function render($file)
	{
		ob_start();
		include(dirname(__FILE__) . '/' . $file);
		return ob_get_clean();
	}
}

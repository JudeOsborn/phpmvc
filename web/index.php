<?php
/**
This is the site entry point. It loads the basic modules and creates a front controller instance.
*/

// Turn on error reporting.
error_reporting(E_ALL);

// Require Components
spl_autoload_register(null, false);
spl_autoload_extensions('.php');

function loadModel($class)
{
	$file = '../application/models/' . $class . '.php';

	if (file_exists($file))
	{
		require_once($file);
	}
}

function loadView($class)
{
	$file = '../application/views/' . $class . '.php';

	if (file_exists($file))
	{
		require_once($file);
	}
}

function loadController($class)
{
	$file = '../application/controller/' . $class . '.php';

	if (file_exists($file))
	{
		require_once($file);
	}
}

spl_autoload_register('loadModel', false);
spl_autoload_register('loadView', false);
spl_autoload_register('loadController', false);

require_once('../application/models/front.php');
require_once('../application/models/icontroller.php');
require_once('../application/models/view.php');

// Require Controllers
require_once('../application/controllers/index.php');

// Initialize the FrontController
$front = FrontController::getInstance();
$front->route();

print $front->getBody();

<?php
// Load the Front Controller class
require_once('Zend/Controller/Front.php');
// Instantiate an instance of the Front Controller Class
$frontController = Zend_Controller_Front::getInstance();
// Point to the module directory
$frontController->addModuleDirectory('./application/modules');
// Throw exceptions (useful during debugging)
$frontController->throwExceptions(true);
// Start the Front Controller
$frontController->dispatch();
?>
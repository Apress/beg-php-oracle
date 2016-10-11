<?php
// Load the Zend_Controller_Action class
require_once('Zend/Controller/Action.php');
class AboutController extends Zend_Controller_Action
{
// Accessed through http://www.example.com/about/
public function indexAction()
{
$this->view->title = "About Our Chess Club";
}
// Accessed through http://www.example.com/about/you/
public function youAction()
{
// Page title
$this->view->title = "About You!";
// Retrieve the user's IP address
$this->view->ip = $_SERVER['REMOTE_ADDR'];
// Retrieve browser information
$this->view->browser = $_SERVER['HTTP_USER_AGENT'];
}
}
?>
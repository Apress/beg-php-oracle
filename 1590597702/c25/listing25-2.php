<?php
// Load the Zend_Controller_Action class
require_once('Zend/Controller/Action.php');
class IndexController extends Zend_Controller_Action
{
// Accessed through http://www.example.com/
public function indexAction()
{
$this->view->title = "Welcome to Our Chess Club Web Site!";
}
}
?>
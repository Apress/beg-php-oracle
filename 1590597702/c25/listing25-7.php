<?php
// Load the Zend_Controller_Action class
require_once('Zend/Controller/Action.php');

// Load the Yahoo! Service class
require_once('Zend/Service/Yahoo.php');
class NewsController extends Zend_Controller_Action
{
public function indexAction()
{
// Invoke the Yahoo! service
$yahoo = new Zend_Service_Yahoo("INSERT_YAHOO_ID_HERE");
// Execute the search
$results = $yahoo->newsSearch("chess");
// Send the search results to the view
$view->results = $results;
}
}

?>
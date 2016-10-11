<?php

class My_Exception extends Exception {
function __construct($language,$errorcode) {
$this->language = $language;
$this->errorcode = $errorcode;
}
function getMessageMap() {
$errors = file("errors/".$this->language.".txt");
foreach($errors as $error) {
list($key,$value) = explode(",",$error,2);
$errorArray[$key] = $value;
}
return $errorArray[$this->errorcode];
}
} # end My_Exception
try {
throw new My_Exception("english",4);
}
catch (My_Exception $e) {

?>
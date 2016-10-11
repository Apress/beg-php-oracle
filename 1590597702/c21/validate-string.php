<?php
// Include the Validate package
require_once "Validate.php";
// Retrieve the provided username
$username = $_POST['username'];

// Instantiate the Validate class
$validate = new Validate();
// Determine if address is valid
if($validate->string($username, array("format" => VALIDATE_ALPHA,
"min_length"=> "3", "max_length" => "15")))
echo "Valid username!";
else
echo "The username must be between 3 and 15 characters in length!";
?>
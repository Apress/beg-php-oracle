<?php
// Include the Validate package
require_once "Validate.php";
// Retrieve the provided e-mail address
$email = $_POST['email'];
// Instantiate the Validate class
$validate = new Validate();
// Determine if address is valid
if($validate->email($email))
echo "Valid e-mail address!";
else
echo "Invalid e-mail address!";
?>
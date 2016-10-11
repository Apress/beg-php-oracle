<?php
// Connect to the Oracle database
$conn = oci_connect('WEBUSER', 'oracle123', '//127.0.0.1/XE')
or die("Can't connect to database server!");
// Create unique identifier
$id = md5(uniqid(rand(),1));
// Filter the e-mail address
$emailaddr = htmlentities($_POST['email']);
// Set user's uniqueidentifier field to a unique id.
$query = "UPDATE userauth SET unique_identifier=:id WHERE email=:email";

// Prepare statement
$stmt = oci_parse($conn, $query);
// Bind the values
oci_bind_by_name($stmt, ':id', $id, 32);
oci_bind_by_name($stmt, ':email', $emailaddr, 55);
// Execute statement
oci_execute($stmt);
// Create the e-mail
$email = <<<email
Dear user,
Click on the following link to reset your password:
http://www.example.com/users/lostpassword.php?id=$id
email;
// E-mail user password reset options
mail($emailaddr,"Password recovery",
"$email","FROM:services@example.com");
echo "<p>Instructions regarding resetting your
password have been sent to {$emailaddr}</p>";
?>
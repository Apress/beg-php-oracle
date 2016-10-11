<?php
// Create a pseudorandom password five characters in length
$pswd = substr(md5(uniqid(rand(),1),5));
// Filter the passed user ID
$id = htmlentities($_GET['id']);
// Update the user table with the new password.
$query = "UPDATE userauth SET pswd=:pswd WHERE unique_identifier=:id";
// Prepare statement
$stmt = oci_parse($conn, $query);
// Bind the values
oci_bind_by_name($stmt, ':id', $id);
oci_bind_by_name($stmt, ':pswd', $pswd, 5);
// Execute statement
oci_execute($stmt);
// Display the new password to the user
echo "<p>Your password has been reset to $pswd. Please log in and change
your password to one of your liking.</p>";
?>
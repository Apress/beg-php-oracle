<?php
session_start();
// Has a session been initiated previously?
if (! isset($_SESSION['username'])) {
// If no previous session, has the user submitted the form?
if (isset($_POST['username']))
{
$username = htmlentities($_POST['username']);
$pswd = htmlentities($_POST['pswd']);
// Connect to the Oracle database
$conn = oci_connect('WEBUSER', 'oracle123', '//127.0.0.1/XE')
or die("Can't connect to database server!");
// Create query
$query = "SELECT username, pswd FROM users
WHERE username=:username AND pswd=:pswd";

// Prepare statement
$stmt = oci_parse($conn, $query);
// Bind PHP variables and execute query
oci_bind_by_name($stmt, ':username', $username, 8);
oci_bind_by_name($stmt, ':pswd', $pswd, 32);
oci_execute($stmt);
// Has a row been returned?
list($username, $pswd) = oci_fetch_array($stmt, OCI_NUM);
// Has the user been located?
if ($username != "")
{
$_SESSION['username'] = $username;
echo "You've successfully logged in. ";
}
// If the user has not previously logged in, show the login form
} else {
include "login.html";
}
// The user has returned. Offer a welcoming note.
} else {
printf("Welcome back, %s!", $_SESSION['username']);
}
?>
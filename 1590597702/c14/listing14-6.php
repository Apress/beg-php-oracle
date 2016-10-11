<?php

	// Create a function for displaying the authentication prompt
	function authenticate_user() {
		header('WWW-Authenticate: Basic realm="Secret Stash"');
		header("HTTP/1.0 401 Unauthorized");
		exit;
	}
	
	// If no username or password provided, authenticate
	if (! isset($_SERVER['PHP_AUTH_USER']) || ! isset($_SERVER['PHP_AUTH_PW'])) {
		authenticate_user();
	} else {

	// Connect to the Oracle database
	$conn = oci_connect('WEBUSER', 'oracle123', '//127.0.0.1/XE') or die("Can't connect to database server!");

	// Convert the provided password into a hash
	$pswd = md5($_SERVER['PHP_AUTH_PW']);

	// Create query
	$query = "SELECT username, pswd FROM userauth WHERE username=:username AND pswd=:pswd";

	// Prepare statement
	$stmt = oci_parse($conn, $query);

	// Bind PHP variables
	oci_bind_by_name($stmt, ':username', $_SERVER['PHP_AUTH_USER'], 8);
	oci_bind_by_name($stmt, ':pswd', $pswd, 32);

	// Execute statement
	oci_execute($stmt);

	// Has a row been returned?
	list($username, $pswd) = oci_fetch_array($stmt, OCI_NUM);

	// If no row, attempt to authenticate anew
	if ($username == "") {
		authenticate_user();
	} else {
		echo "Welcome to the secret zone!";
	}
	}
?>
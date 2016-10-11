<?php
/*
* oracle_session_open()
* Opens a persistent server connection and selects the database.
*/
function oracle_session_open($session_path, $session_name) {
GLOBAL $conn;
// Connect to the Oracle database
$conn = oci_pconnect('WEBUSER', 'oracle123', '//127.0.0.1/XE')
or die("Can't connect to database server!");
} // end oracle_session_open()

/*
* oracle_session_close()
* Doesn't actually do anything since the server connection is
* persistent. Keep in mind that although this function
* doesn't do anything in my particular implementation, it
* must nonetheless be defined.
*/
function oracle_session_close() {
return 1;
} // end oracle_session_close()
/*
* oracle_session_select()
* Reads the session data from the database
*/
function oracle_session_select($SID) {
GLOBAL $conn;
$query = "SELECT value FROM sessions
WHERE sessionID = :SID AND
expiration > ". time();
$stmt = oci_parse($conn, $query);
// Bind value
oci_bind_by_name($stmt, ':SID', $SID, 32);

// Execute statement
oci_execute($stmt);
// Has a row been returned?
$row = oci_fetch_array($stmt, OCI_NUM);
if (isset($row[0])) {
return $row[0];
} else {
return "";
}
} // end oracle_session_select()
/*
* oracle_session_write()
* This function writes the session data to the database.
* If that SID already exists, then the existing data will be updated.
*/

function oracle_session_write($SID, $value) {
GLOBAL $conn;
// Retrieve the maximum session lifetime
$lifetime = get_cfg_var("session.gc_maxlifetime");
// Set the session expiration date
$expiration = time() + $lifetime;
$query = "UPDATE sessions SET
expiration = :expiration,
value = :value WHERE
sessionID = :SID AND expiration >". time();
// Prepare statement
$stmt = oci_parse($conn, $query);
// Bind the values
oci_bind_by_name($stmt, ':SID', $SID, 32);
oci_bind_by_name($stmt, ':expiration', $expiration);
oci_bind_by_name($stmt, ':value', $value);
oci_execute($stmt);
// The session didn't exist since no rows were updated
if (oci_num_rows($stmt) == 0) {
// Insert the session data into the database
$query = "INSERT INTO sessions (sessionID, expiration, value)
VALUES(:SID, :expiration, :value)";

// Prepare statement
$stmt = oci_parse($conn, $query);
// Bind the values
oci_bind_by_name($stmt, ':SID', $SID, 32);
oci_bind_by_name($stmt, ':expiration', $expiration);
oci_bind_by_name($stmt, ':value', $value);
oci_execute($stmt);
}
} // end oracle_session_write()
/*
* oracle_session_destroy()
* Deletes all session information having input SID (only one row)
*/

function oracle_session_destroy($SID) {
GLOBAL $conn;
// Delete all session information having a particular SID
$query = "DELETE FROM sessions WHERE sessionID = :SID";
$stmt = oci_parse($conn, $query);
oci_bind_by_name($stmt, ':SID', $SID);
oci_execute($stmt);
} // end oracle_session_destroy()

/*
* oracle_session_garbage_collect()
* Deletes all sessions that have expired.
*/

function oracle_session_garbage_collect($lifetime) {
	GLOBAL $conn;
	$time = time() - $lifetime;

	// Delete all sessions older than a specific age
	$query = "DELETE FROM sessions
		WHERE expiration < :lifetime";

	$stmt = oci_parse($conn, $query);
	oci_bind_by_name($stmt, ':lifetime', $time);

	oci_execute($stmt);
	return oci_num_rows($stmt);
	
} // end oracle_session_garbage_collect()

session_set_save_handler("oracle_session_open", 
	"oracle_session_close",
	"oracle_session_select",
	"oracle_session_write",
	"oracle_session_destroy",
	"oracle_session_garbage_collect");

?>
<?php
$sqldb = sqlite_open("corporate.db");
$results = sqlite_query($sqldb, "SELECT * FROM employees");
while (list($empid, $name) = sqlite_fetch_array($results)) {
echo "Name: $name (Employee ID: $empid)<br />";
}
sqlite_close($sqldb);
?>
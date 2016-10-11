<?php
$sqldb = sqlite_open("corporate.db");
$results = sqlite_query($sqldb, "SELECT * FROM employees");
while ($row = sqlite_fetch_array($results,SQLITE_BOTH)) {
echo "Name: $row[1] (Employee ID: ".$row['empid'].")<br />";
}
sqlite_close($sqldb);
?>
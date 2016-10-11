<?php
$sqldb = sqlite_open("corporate.db");
$rows = sqlite_array_query($sqldb, "SELECT empid, name FROM employees");
foreach ($rows AS $row) {
echo $row["name"]." (Employee ID: ".$row["empid"].")<br />";
}
sqlite_close($sqldb);
?>
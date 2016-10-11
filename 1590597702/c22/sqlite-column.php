<?php
$sqldb = sqlite_open("corporate.db");
$results = sqlite_query($sqldb,"SELECT * FROM employees WHERE empid = '1'");
$name = sqlite_column($results,"name");
$empid = sqlite_column($results,"empid");
echo "Name: $name (Employee ID: $empid) <br />";
sqlite_close($sqldb);
?>
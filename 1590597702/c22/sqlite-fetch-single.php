<?php
$sqldb = sqlite_open("corporate.db");
$results = sqlite_query($sqldb,"SELECT name FROM employees WHERE empid < 3");
while ($name = sqlite_fetch_single($results)) {
echo "Employee: $name <br />";
}
sqlite_close($sqldb);
?>
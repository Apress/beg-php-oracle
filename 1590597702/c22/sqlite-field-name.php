<?php
$sqldb = sqlite_open("corporate.db");
$results = sqlite_query($sqldb,"SELECT * FROM employees");
echo "Field name found at offset #0: ".sqlite_field_name($results,0)."<br />";
echo "Field name found at offset #1: ".sqlite_field_name($results,1)."<br />";
echo "Field name found at offset #2: ".sqlite_field_name($results,2)."<br />";
sqlite_close($sqldb);
?>
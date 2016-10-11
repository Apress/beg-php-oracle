<?php
$sqldb = sqlite_open("corporate.db");
$results = sqlite_query($sqldb, "SELECT * FROM employees");
echo "Total fields returned: ".sqlite_num_fields($results)."<br />";
sqlite_close($sqldb);
?>
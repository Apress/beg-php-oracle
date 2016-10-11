<?php
$sqldb = sqlite_open("corporate.db");
$results = sqlite_query($sqldb, "SELECT * FROM employees");
echo "Total rows returned: ".sqlite_num_rows($results)."<br />";
sqlite_close($sqldb);
?>
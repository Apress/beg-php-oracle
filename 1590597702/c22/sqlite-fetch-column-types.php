<?php
$sqldb = sqlite_open("corporate.db");
$columnTypes = sqlite_fetch_column_types("employees", $sqldb);
print_r($columnTypes);
sqlite_close($sqldb);
?>
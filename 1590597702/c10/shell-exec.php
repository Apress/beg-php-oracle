<?php
$result = shell_exec("date");
printf("<p>The server timestamp is: %s</p>", $result);
?>
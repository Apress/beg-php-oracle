<?php
$outcome = exec("languages.pl", $results);
foreach ($results as $result) echo $result;
?>
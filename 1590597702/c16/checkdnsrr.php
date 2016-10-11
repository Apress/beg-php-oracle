<?php

	$recordexists = checkdnsrr("example.com", "ANY");

	if ($recordexists) echo "The domain name has been reserved. Sorry!";
		else echo "The domain name is available!";
?>
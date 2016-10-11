<?php

    $file = "/home/www/data/users.txt";

	// Open the file for reading
	$fh = fopen($file, "rt");

	// Read in the entire file
	$userdata = fread($fh, filesize($file));

	// Close the file handle
	fclose($fh);
	
?>
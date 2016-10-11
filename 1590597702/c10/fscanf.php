<?php

	$fh = fopen("socsecurity.txt", "r");

	// Parse each SSN in accordance with integer-integer-integer format
	while ($user = fscanf($fh, "%d-%d-%d")) {
	
		// Assign each SSN part to an appropriate variable
		list ($part1,$part2,$part3) = $user;
		printf(Part 1: %d Part 2: %d Part 3: %d <br />", $part1, $part2, $part3);
	}

	fclose($fh);
	
?>
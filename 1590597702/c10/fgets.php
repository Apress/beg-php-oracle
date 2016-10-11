<?php

    // Open a handle to users.txt
    $fh = fopen("/home/www/data/users.txt", "rt");

    // While the EOF isn't reached, read in another line and output it
    while (!feof($fh)) echo fgets($fh);

    // Close the handle
    fclose($fh);

?>
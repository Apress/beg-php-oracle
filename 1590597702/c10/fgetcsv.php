<?php

    // Open the subscribers data file
    $fh = fopen("/home/www/data/subscribers.csv", "r");

    // Break each line of the file into three parts
    while (list($name, $email, $phone) = fgetcsv($fh, 1024, ",")) {

        // Output the data in HTML format
        printf("<p>%s (%s) Tel. %s</p>", $name, $email, $phone);
    }

?>







<?php

    // Read the file into an array
    $users = file("/home/www/data/subscribers.csv");

    foreach ($users as $user) {

        // Break each line of the file into three parts
        list($name, $email, $phone) = explode(",", $user);
        
        // Output the data in HTML format
        printf("<p>%s (%s) Tel. %s</p>", $name, $email, $phone);
    }

?>








<?php
    for ($count = 0; $count < 10; $count++) {
        $randomNumber = rand(1,50);
        if ($randomNumber < 10)
            goto less;
        else
            echo "Number greater than 10: $randomNumber<br />";
    }
    less:
        echo "Number less than 10: $randomNumber<br />";
?>
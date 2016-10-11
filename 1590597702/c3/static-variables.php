<?php
    function keep_track() {
        STATIC $count = 0;
        $count++;
        echo $count;
        echo "<br />";
    }

    keep_track();
    keep_track();
    keep_track();

?>
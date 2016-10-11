<?php
    $drive = "/usr";
    printf("Remaining MB on %s: %.2f", $drive,
        round((disk_free_space($drive) / 1048576), 2));
?>
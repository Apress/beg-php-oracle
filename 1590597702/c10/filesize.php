<?php
    $file = "/www/htdocs/book/chapter1.pdf";
    $bytes = filesize($file);
    $kilobytes = round($bytes/1024, 2);
    printf("File %s is $bytes bytes, or %.2f kilobytes",
    basename($file), $kilobytes);
?>
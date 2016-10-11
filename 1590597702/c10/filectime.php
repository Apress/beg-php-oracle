<?php
    $file = "/usr/local/apache2/htdocs/book/chapter10/stat.php";
    printf("File inode last changed: %s", date("m-d-y g:i:sa", fileatime($file)));
?>
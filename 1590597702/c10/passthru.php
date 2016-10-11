<?php
    header("ContentType:image/png");
    passthru("giftopnm cover.gif | pnmtopng > cover.png");
?>
<?php

    // Build list of acceptable tags
    $tags = "<h2><h3><p><b><a><img>";

    // Open the article, and read its contents.
    $fh = fopen("article.html", "rt");

    while (!feof($fh)) {
        $article .= fgetss($fh, 1024, $tags);
    }

    // Close the handle
    fclose($fh);
   
    // Open the file up in write mode and output its contents.
    $fh = fopen("article.html", "wt");

	fwrite($fh, $article);

	// Close the handle
    fclose($fh);

	?>
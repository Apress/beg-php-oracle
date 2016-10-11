<?php

   function pageLinks($totalpages, $currentpage, $pagesize, $parameter) {

      // Start at page one
      $page = 1;

      // Start at record one
      $recordstart = 1;

      // Initialize $pageLinks
      $pageLinks = "";

      while ($page <= $totalpages) {
         // Link the page if it isn't the current one
         if ($page != $currentpage) {
            $pageLinks .= "<a href=\"".$_SERVER['PHP_SELF'].
                          "?$parameter=$recordstart\">$page</a> ";
         // If the current page, just list the number
         } else {
            $pageLinks .= "$page ";
         }
            // Move to the next record delimiter
            $recordstart += $pagesize;
            $page++;
      }
      return $pageLinks;
   }

?>

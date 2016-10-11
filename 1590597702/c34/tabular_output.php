<?php

   function tabular_output($conn, $query)
   {

      // Create the table object
      $table = new HTML_Table();

      // Parse and execute the query
      $s = oci_parse($conn, $query);
      oci_execute($s);

      // Cycle through each field, outputting its name
      $ncols = oci_num_fields($s);      
      for($i = 0; $i < $ncols; $i++) {
         $header = "<a href='" . $_SERVER['PHP_SELF'] .
                   "?sort=" . oci_field_name($s, $i+1) . "'>" .
                   oci_field_name($s, $i+1) . "</a>";
         $table->setHeaderContents(0, $i, $header);
      // originally:   $table->setHeaderContents(0, $i, oci_field_name($s, $i+1));
      }

      // Cycle through the array to produce the table data
      // Begin at row 1 so don't overwrite the header
      $rownum = 1;

      // Reset column offset
      $colnum = 0;

      // Cycle through each row in the result set
      while ($row = oci_fetch_array($s, OCI_RETURN_NULLS)) {
         // Cycle through each column in the row
         while ($colnum < $ncols) {
            $table->setCellContents($rownum, $colnum, $row[$colnum]);
            $colnum++;
         }
         $rownum++;
         $colnum = 0;
      }

      // $table->altRowAttributes(1, null, array("class"=>"alt"));

      // Output the data
      echo $table->toHTML();
   }

?>

<?php
   $c = oci_connect('hr', 'hr', '//localhost/xe');
   $table_name = 'LOCATIONS';
   $s = oci_parse($c,'select * from ' . $table_name);
   oci_execute($s);
   
   echo "<b>Table: </b>" . $table_name . "<br><br>";
   echo "<table border=\"1\">";
   echo "<tr>";
   echo "<th>Name</th>";
   echo "<th>Type</th>";
   echo "<th>Size</th>";
   echo "<th>Precision</th>";
   echo "<th>Scale</th>";
   echo "</tr>";
  
   $ncols = oci_num_fields($s);

   for ($i = 1; $i <= $ncols; $i++) {
       $column_name  = oci_field_name($s, $i);
       $column_type  = oci_field_type($s, $i);
       $column_size  = oci_field_size($s, $i);
       $column_prec  = oci_field_precision($s, $i);
       $column_scale = oci_field_scale($s, $i);
      
       echo "<tr>";
       echo "<td>$column_name</td>";
       echo "<td>$column_type</td>";
       echo "<td>$column_size</td>";
       echo "<td>$column_prec</td>";
       echo "<td>$column_scale</td>";
       echo "</tr>";
   }
      
   echo "</table>\n";
   oci_free_statement($s);  

   oci_close($c);
?>

<?php
   // Connect to Oracle Database XE
   $c = oci_connect('hr', 'hr', '//localhost/xe');

   // Create and execute the query
   $result = oci_parse($c,
      "select employee_id, last_name, first_name, department_name" .
      " from employee_department_view where rownum < 11");
   oci_execute($result);

   // Format the table
   echo "<table border='1'>";
   echo "<tr>";

   // Output the column headers
   for ($i = 1; $i <= oci_num_fields($result); $i++)
      echo "<th>".oci_field_name($result, $i)."</th>";

   echo "</tr>";

   // output the results
   while ($employee = oci_fetch_row($result)) {
      $emp_id = $employee[0];
      $last_name = $employee[1];
      $first_name = $employee[2];
      $dept_name = $employee[3];
      echo "<tr>";
      echo "<td>$emp_id</td><td>$last_name</td>";
      echo "<td>$first_name</td><td>$dept_name</td>";
      echo "</tr>";
   }

   oci_close($c);
?>

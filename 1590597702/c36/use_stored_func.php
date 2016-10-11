<?php
   // Connect to Oracle Database XE
   $c = oci_connect('hr', 'hr', '//localhost/xe');

   // Create and execute the query
   $result = oci_parse($c,
      'select employee_id "Employee Number", ' . 
      'format_emp(department_id, last_name, job_id) ' .
      '"Employee Info"' .
      ' from employees where rownum < 11');
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
      $emp_info = $employee[1];
      echo "<tr>";
      echo "<td>$emp_id</td><td>$emp_info</td>";
      echo "</tr>";
   }

   oci_close($c);
?>

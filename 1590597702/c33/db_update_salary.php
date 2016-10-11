<?php

   // Update salaries: increase one salary and decrease
   // another as a single transaction.

   // Connect to the server and select the database
   $c = @oci_connect('hr', 'hr', '//localhost/xe') 
             or die("Could not connect to Oracle server");

   // Show salaries before update.
   echo "Previous salaries: <br>";
   $s = oci_parse($c, 'select employee_id, last_name, salary from employees'
                       . ' where employee_id in (100,102)');

   oci_execute($s, OCI_DEFAULT);
   while ($res = oci_fetch_array($s)) {
      echo $res['EMPLOYEE_ID'] . ' -- ' . $res['LAST_NAME']
            . ': ' . $res['SALARY'] . "<br>";
   }

   // add $1000 to first employee's salary

   $s = oci_parse($c, "update employees
                        set salary = salary + 1000
                        where employee_id = 100");

   $result = oci_execute($s, OCI_DEFAULT);

   // subtract $1000 from second employee's salary

   $s = oci_parse($c, "update employees
                        set salary = salary - 1000
                        where employee_id = 102");

   $result = oci_execute($s, OCI_DEFAULT);


   // end of transaction
   oci_commit($c);

   // Show salaries after update.

   echo "<br><br><br>New salaries: <br>";
   $s = oci_parse($c, 'select employee_id, last_name, salary from employees'
                       . ' where employee_id in (100,102)');

   oci_execute($s, OCI_DEFAULT);
   while ($res = oci_fetch_array($s)) {
      echo $res['EMPLOYEE_ID'] . ' -- ' . $res['LAST_NAME']
            . ': ' . $res['SALARY'] . "<br>";
   }


   // done. If there are any uncommitted transactions, oci_close()
   // will roll back.

   oci_close($c);


?>

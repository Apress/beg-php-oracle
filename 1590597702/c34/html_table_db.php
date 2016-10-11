<style>

table {
	border-width: 1px 1px 1px 1px;
	border-spacing: 2px;
	border-style: outset outset outset outset;
	border-color: gray gray gray gray;
	border-collapse: separate;
	background-color: white;
}
table th {
	border-width: 1px 1px 1px 1px;
	padding: 2px 2px 2px 2px;
	border-style: inset inset inset inset;
	border-color: black black black black;
	background-color: #336699;
        color: #FFFFFF;
	-moz-border-radius: 0px 0px 0px 0px;
}
table td {
	border-width: 1px 1px 1px 1px;
	padding: 2px 2px 2px 2px;
	border-style: inset inset inset inset;
	border-color: black black black black;
	background-color: white;
	-moz-border-radius: 0px 0px 0px 0px;
}

td.alt {
   background: #CCCC99;
}

</style>


<?php


   // Show an HTML_Table form populated from a database table
   // containing employee data.

   // Include the HTML_Table package

   require_once "c:\php5.2.0\PEAR\HTML\Table.php";

   // Connect to the server and select the database
   $c = @oci_connect('hr', 'hr', '//localhost/xe') 
             or die("Could not connect to Oracle server");

 
   // Create the table object

   $table = new HTML_Table();

   // Set the headers

   $table->setHeaderContents(0, 0, "Emp ID");
   $table->setHeaderContents(0, 1, "First");
   $table->setHeaderContents(0, 2, "Last");
   $table->setHeaderContents(0, 3, "EMail");
   $table->setHeaderContents(0, 4, "Phone");
   $table->setHeaderContents(0, 5, "Hire Date");
   $table->setHeaderContents(0, 6, "Job ID");
   $table->setHeaderContents(0, 7, "Salary");
   $table->setHeaderContents(0, 8, "Comm Pct");
   $table->setHeaderContents(0, 9, "Mgr ID");
   $table->setHeaderContents(0, 10, "Dept ID");


   // Cycle through the array to produce the table data
   // after calling the query to retrieve the first 5 rows

   $s = oci_parse($c, 
      "select employee_id, first_name, last_name, email, " .
      "phone_number, hire_date, job_id, salary, commission_pct, " .
      "manager_id, department_id from employees where rownum < 6");

   oci_execute($s);

   $rownum = 1;  // don't overwrite header of table
   while ($res = oci_fetch_array($s)) {
      for($colnum = 0; $colnum < 11; $colnum++) {  
      $table->setCellContents($rownum, $colnum, $res[$colnum]);
      }
   $rownum++;
   }

   $table->altRowAttributes(1, null, array("class"=>"alt"));

   // Output the data

   echo $table->toHTML();

   oci_close($c);

?>
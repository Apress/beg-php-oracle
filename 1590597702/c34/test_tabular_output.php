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

   require_once "HTML\Table.php";
   require_once "tabular_output.php";

   // Connect to the server and select the database
   $c = @oci_connect('hr', 'hr', '//localhost/xe') 
             or die("Could not connect to Oracle server");
 
   tabular_output($c,
      "select employee_id, first_name, last_name, email, " .
      "phone_number, hire_date, job_id, salary, commission_pct, " .
      "manager_id, department_id from employees where rownum < 6");

   oci_close($c);

?>
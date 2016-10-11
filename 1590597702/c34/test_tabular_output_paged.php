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
	background-color: #FFFFFF;
        color: #000000;
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
   // containing employee data, with sorting and paging
   // capabilities.

   require_once "HTML\Table.php";
   require_once "tabular_output.php";

   // Connect to the server and select the database
   $c = @oci_connect('hr', 'hr', '//localhost/xe') 
             or die("Could not connect to Oracle server");

   // default or specified sort order for results
   $sort = (isset($_GET['sort'])) ? $_GET['sort'] : "EMPLOYEE_ID";

   // page size for result set
   $pagesize = 10;

   // starting row number; start with 1 if not specified
   $startrow = (int) $_GET['startrow'];
   $startrow = (isset($_GET['startrow'])) ? $startrow : 1;

   // define target query for further processing
   $pquery = "select employee_id, first_name, last_name," .
      "hire_date, job_id, salary ,manager_id, " .
      "department_id from employees order by " . $sort;

   $s = oci_parse($c, "select count(*) from ( $pquery )");
   oci_execute($s);
   $row = oci_fetch_array($s, OCI_NUM);
   $rowcount = $row[0];

   tabular_output($c, "select employee_id, first_name, last_name," .
                      "hire_date, job_id, salary ,manager_id, " .
                      "department_id " .
                      "from ( select t.*, rownum as rnum" . 
                      "       from ( $pquery ) t " .
                      "       where rownum <= ($startrow + $pagesize - 1) ) " .
                      "where rnum >= $startrow" );

   // Create the 'previous' link
   if ($startrow > 1) {
      $prev = $startrow - $pagesize;
      $url = $_SERVER['PHP_SELF'] .
            "?startrow=$prev";
      echo "<a href=\"$url\">Previous Page</a> ";
   }

   // Create the 'next' link
   if ($rowcount > ($startrow + $pagesize - 1)) {
      $next = $startrow + $pagesize;
      $url = $_SERVER['PHP_SELF'] .
             "?startrow=$next";
      echo "<a href=\"$url\">Next Page</a>";
   }

   oci_close($c);

?>

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


   // Show an HTML_Table form populated by an array
   // containing employee data.

   // Include the HTML_Table package

   require_once "c:\php5.2.0\PEAR\HTML\Table.php";

   // Assemble the data in an array

   $empl_report = array(
   '0' => array("100","Steven","King","SKING","515.123.4567","17-JUN-87","AD_PRES","25000","","","90"),
   '1' => array("101","Neena","Kochhar","NKOCHHAR","515.123.4568","21-SEP-89","AD_VP","17000","","100","90"),
   '2' => array("102","Lex","De Haan","LDEHAAN","515.123.4569","13-JAN-93","AD_VP","16000","","100","90"),
   '3' => array("103","Alexander","Hunold","AHUNOLD","590.423.4567","03-JAN-90","IT_PROG","9000","","102","60"),
   '4' => array("104","Bruce","Ernst","BERNST","590.423.4568","21-MAY-91","IT_PROG","6000","","103","60")
   );

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

   for($rownum = 0; $rownum < count($empl_report); $rownum++) {
      for($colnum = 0; $colnum < 11; $colnum++) {  
      $table->setCellContents($rownum+1, $colnum, $empl_report[$rownum][$colnum]);
      }
   }
   $table->altRowAttributes(1, null, array("class"=>"alt"));

   // Output the data

   echo $table->toHTML();

?>

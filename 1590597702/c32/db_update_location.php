<?php

   // If the submit button has been pressed...

   if (isset($_POST['submit']))
   {   

      // Connect to the database
      $c = @oci_connect('hr', 'hr', '//localhost/xe') 
                or die("Could not connect to Oracle server");

      // Retrieve the posted existing location information
      //   and new Postal Code.
      $LocationID = $_POST['LocationID'];
      $PostalCode = $_POST['PostalCode'];

      // Update the Postal Code information into the LOCATION table
      $s = oci_parse($c, "update locations
                           set postal_code = '$PostalCode'
                           where location_id = $LocationID");

      $result = oci_execute($s);
      $rows_affected = oci_num_rows($s);

      // Display an appropriate message
      if ($result) 
      {
         echo "<p>Postal Codes updated: " . $rows_affected . "</p>"; 
         oci_commit($s);
      }
      else
      {
         echo "<p>There was a problem updating the Postal Code!</p>";
         var_dump(oci_error($s));
      }

      oci_close($c);
   }

  // Include the insertion form
  include "update_location.php";

?>

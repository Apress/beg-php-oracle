<?php

   // If the submit button has been pressed...

   if (isset($_POST['submit']))
   {   

      // Connect to the database
      $c = @oci_connect('hr', 'hr', '//localhost/xe') 
                or die("Could not connect to Oracle server");

      // Retrieve the posted existing location information
      //   and delete the row.
      $LocationID = $_POST['LocationID'];

      // Update the Postal Code information into the LOCATION table
      $s = oci_parse($c, "delete from locations
                           where location_id = $LocationID");

      $result = oci_execute($s);
      $rows_affected = oci_num_rows($s);

      // Display an appropriate message
      if ($result) 
      {
         echo "<p>Locations deleted: " . $rows_affected . "</p>"; 
         oci_commit($s);
      }
      else
      {
         echo "<p>There was a problem deleting a location!</p>";
         var_dump(oci_error($s));
      }

      oci_close($c);
   }

  // Include the deletion form
  include "delete_location.php";

?>

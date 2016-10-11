<?php

   // If the submit button has been pressed...

   if (isset($_POST['submit']))
   {   

      // Connect to the database
      $c = @oci_connect('hr', 'hr', '//localhost/xe') 
                or die("Could not connect to Oracle server");

      // Retrieve the posted new location information.
      $LocationID = $_POST['LocationID'];
      $StreetAddress = $_POST['StreetAddress'];
      $PostalCode = $_POST['PostalCode'];
      $City = $_POST['City'];
      $StateOrProvince = $_POST['StateOrProvince'];
      $CountryCode = $_POST['CountryCode'];

      // Insert the location information into the LOCATION table
      $s = oci_parse($c, "insert into locations
                           (location_id, street_address, postal_code,
                            city, state_province, country_id) 
                           values ($LocationID, '$StreetAddress', '$PostalCode',
                                  '$City', '$StateOrProvince', '$CountryCode')");

      $result = oci_execute($s);


      // Display an appropriate message
      if ($result) 
      {
         echo "<p>Location successfully inserted!</p>"; 
         oci_commit($s);
      }
      else
      {
         echo "<p>There was a problem inserting the location!</p>";
         var_dump(oci_error($s));
      }

      oci_close($c);
    }

  // Include the insertion form
  include "insert_location.php";

?>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <p><b>Update your profile.</b></p>
    <p>
      Technician ID:<br />
      <input type="text" name="technician_id" size="6" maxlength="6" value="" />
    </p>
    <p>
      Name:<br />
      <input type="text" name="name" size="25" maxlength="25" value="" />
    </p>
    <p>
      EMail Address:<br />
      <input type="text" name="email" size="40" maxlength="40" value="" />
    </p>
    <p>
      Availability (0=unavailable, 1=available):<br />
      <input type="text" name="available" size="1" maxlength="1" value="1" />
    </p>
    <p>
      <input type="submit" name="submit" value="Update!" />
    </p>
</form>

<?php
   // Connect to Oracle Database XE
   $c = oci_connect('hr', 'hr', '//localhost/xe');

   // Assign the POSTed values for convenience

   $technicianid = $_POST['technician_id'];
   $name = $_POST['name'];
   $email = $_POST['email'];
   $available = $_POST['available'];

   // Create and run the UPDATE statement
   $result = oci_parse($c,
              "UPDATE technician SET name='$name', email='$email',   
               available='$available' WHERE technician_id='$technician_id'";
   oci_execute($result);

   echo "<p>Thank you for updating your profile.</p>";

   if ($available == 0) {
      echo "<p>Because you'll be out of the office, 
            your tickets will be reassigned to another
            technician.</p>";
   }

   oci_close($c);
?>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <p>Modify a Location's Postal Code in the LOCATIONS table.</p>
    <p>
      Location ID Number:<br />
      <input type="text" name="LocationID" size="4" maxlength="4" value="" />
    </p>
    <p>
      New Postal Code:<br />
      <input type="text" name="PostalCode" size="12" maxlength="12" value="" />
    </p>
    <p>
      <input type="submit" name="submit" value="Submit!" />
    </p>
</form>

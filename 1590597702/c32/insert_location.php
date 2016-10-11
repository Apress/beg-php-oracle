<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <p>Add a Location to the LOCATIONS table.</p>
    <p>
      Location ID Number:<br />
      <input type="text" name="LocationID" size="4" maxlength="4" value="" />
    </p>
    <p>
      Street Address:<br />
      <input type="text" name="StreetAddress" size="40" maxlength="40" value="" />
    </p>
    <p>
      Postal Code:<br />
      <input type="text" name="PostalCode" size="12" maxlength="12" value="" />
    </p>
    <p>
      City:<br />
      <input type="text" name="City" size="30" maxlength="30" value="" />
    </p>
    <p>
      State or Province:<br />
      <input type="text" name="StateOrProvince" size="25" maxlength="25" value="" />
    </p>
    <p>
      Country Code:<br />
      <input type="text" name="CountryCode" size="2" maxlength="2" value="" />
    </p>
    <p>
      <input type="submit" name="submit" value="Submit!" />
    </p>
</form>

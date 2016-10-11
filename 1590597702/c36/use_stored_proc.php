<?php
   // Connect to Oracle Database XE
   $c = oci_connect('hr', 'hr', '//localhost/xe');

   // Create and parse the query
   $result = oci_parse($c,
      'BEGIN ' . 
      '   say_hello_to_someone(:who, :message); ' .
      'END;');

   oci_bind_by_name($result,':who',$who,32); // IN parameter
   oci_bind_by_name($result,':message',$message,64); // OUT parameter

   $who = 'Dr. Who';

   // Execute the query
   oci_execute($result);

   echo "$message\n";

   oci_close($c);
?>

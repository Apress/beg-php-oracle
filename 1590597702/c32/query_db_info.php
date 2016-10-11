<?php
   $c = oci_connect('rjb', 'rjb', '//localhost/xe');
   $s = oci_parse($c,'select name, created, log_mode, open_mode from v$database');
   oci_execute($s);
   echo '<b>Database Characteristics:</b><br><br>';

   $res = oci_fetch_array($s);
   echo 'Database Name: ' . $res['NAME'] . '<br>' ;
   echo 'Created: ' . $res['CREATED'] . '<br>' ;
   echo 'Log Mode: ' . $res['LOG_MODE'] . '<br>' ;
   echo 'Open Mode: ' . $res['OPEN_MODE'] . '<br>' ;
   
   echo '<br><br>';
   $s = oci_parse($c,'select instance_name, host_name, version,
                        startup_time, status, edition from v$instance');
   oci_execute($s);
   echo '<b>Instance Characteristics:</b><br><br>';

   $res = oci_fetch_array($s);
   echo 'Instance Name: ' . $res['INSTANCE_NAME'] . '<br>' ;
   echo 'Host Name: ' . $res['HOST_NAME'] . '<br>' ;
   echo 'Version: ' . $res['VERSION'] . '<br>' ;
   echo 'Startup Time: ' . $res['STARTUP_TIME'] . '<br>' ;
   echo 'Status: ' . $res['STATUS'] . '<br>' ;
   echo 'Edition: ' . $res['EDITION'] . '<br>' ;


   oci_close($c);
?>

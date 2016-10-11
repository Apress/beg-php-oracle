<?php
if ($conn = oci_connect('system', 'justdid4it', '//localhost/xe')) {
    print 'Successfully connected to Oracle Database XE!';
    oci_close($conn);
}
else {
    $errmsg = oci_error();
    print 'Oracle connect error: ' . $errmsg['message'];
}
?>

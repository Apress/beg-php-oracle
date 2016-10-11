<?php

	$host = "ldap.openldap.org";
	$port = "389";

	$connection = ldap_connect($host, $port)
		or die("Can't establish LDAP connection");
?>
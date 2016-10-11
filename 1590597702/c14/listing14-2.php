<?php

	if (($_SERVER['PHP_AUTH_USER'] != 'specialuser') ||
		($_SERVER['PHP_AUTH_PW'] != 'secretpassword')) {

			header('WWW-Authenticate: Basic Realm="Secret Stash"');
			header('HTTP/1.0 401 Unauthorized');
			print('You must provide the proper credentials!');
			exit;
	}

?>
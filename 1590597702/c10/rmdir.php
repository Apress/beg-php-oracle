<?php

    function delete_directory($dir)
    {

		if ($dh = opendir($dir))
		{
			// Iterate through directory contents
			while (($file = readdir ($dh)) != false)
			{
				if (($file == ".") || ($file == "..")) continue;
				if (is_dir($dir . '/' . $file))
					delete_directory($dir . '/' . $file);
				else
					unlink($dir . '/' . $file);
			}

			closedir($dh);
			rmdir($dir);
		}
	}

	$dir = "/usr/local/apache2/htdocs/book/chapter10/test/";

	delete_directory($dir);
	
?>
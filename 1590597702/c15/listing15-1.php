<form action="uploadmanager.php" enctype="multipart/form-data" method="post">
	Last Name:<br /> <input type="text" name="name" value="" /><br />
	Class Notes:<br /> <input type="file" name="classnotes" value="" /><br />
	<p><input type="submit" name="submit" value="Submit Notes" /></p>
</form>

<?php
	/* Set a constant */
	define ("FILEREPOSITORY","/home/www/htdocs/class/classnotes/");

	/* Make sure that the file was POSTed. */
	if (is_uploaded_file($_FILES['classnotes']['tmp_name'])) {
		/* Was the file a PDF? */
		if ($_FILES['classnotes']['type'] != "application/pdf") {
			echo "<p>Class notes must be uploaded in PDF format.</p>";
		} else {
			/* move uploaded file to final destination. */
			$name = $_POST['name'];
			$result = move_uploaded_file($_FILES['classnotes']['tmp_name'],
				FILEREPOSITORY."/$name.pdf");
			if ($result == 1) echo "<p>File successfully uploaded.</p>";
			else echo "<p>There was a problem uploading the file.</p>";
		} #endIF
	} #endIF

?>
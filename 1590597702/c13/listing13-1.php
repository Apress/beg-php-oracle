<?php

    // Function used to check e-mail syntax
	function validateEmail($email)
	{
		// Create the e-mail validation regular expression
		$regexp = "^([_a-z0-9-]+)(\.[_a-z0-9-]+)*@([a-z0-9-]+)
				    (\.[a-z0-9-]+)*(\.[a-z]{2,6})$";

		// Validate the syntax
		if (eregi($regexp, $email)) return 1;
			else return 0;
		}
		
		// Has the form been submitted?
		if (isset($_POST['submit']))
		{

			$name = htmlentities($_POST['name']);
			$email = htmlentities($_POST['email']);
			printf("Hi %s<br />", $name);

			if (validateEmail($email))
				printf("The address %s is valid!", $email);
			else
				printf("The address <strong>%s</strong> is invalid!", $email);
		}
?>

<form action="subscribe.php" method="post">
	<p>
		Name:<br />
		<input type="text" id="name" name="name" size="20" maxlength="40" />
	</p>

	<p>
		E-mail address:<br />
		<input type="text" id="email" name="email" size="20" maxlength="40" />
	</p>

	<input type="submit" id="submit" name = "submit" value="Go!" />
</form>
<?php

	// If the submit button has been pressed
	if (isset($_POST['submit']))
	{
		$name = htmlentities($_POST['name']);
		$email = htmlentities($_POST['email']);
		printf("Hi %s! <br />", $name);
		printf("The address %s will soon be a spam-magnet! <br />", $email);
	}
?>

<form action="subscribe.php" method="post">
	<p>
		Name:<br />
		<input type="text" id="name" name="name" size="20" maxlength="40" />
	</p>

	<p>
		E-mail Address:<br />
		<input type="text" id="email" name="email" size="20" maxlength="40" />
	</p>
	<input type="submit" id="submit" name = "submit" value="Go!" />
	
</form>
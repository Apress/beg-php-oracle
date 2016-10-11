<?php

	require_once "HTML/QuickForm.php";

	// Instantiate the HTML_QuickForm class
	$form = new HTML_QuickForm("login");

	// Add text input element for entering username
	$form->addElement('text', 'username', 'Your name: ',
		array('size' => 20, 'maxlength' => 40));

	// Add text input element for entering e-mail address
	$form->addElement('text', 'email', 'E-mail address: ',
		array('size' => 20, 'maxlength' => 50));

	// Add a rule requiring the username
	$form->addRule('username', 'Please provide your username.',
		'required', null, 'client');

	// Add submit button
	$form->addElement('submit', null, 'Submit!');

	if ($form->validate()) {
		echo "Welcome to the restricted site, ".
		htmlspecialchars($form->exportValue('username')). ".";
	}

	// Display the form
	$form->display();
?>
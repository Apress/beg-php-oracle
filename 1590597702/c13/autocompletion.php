<?php

	require 'HTML/QuickForm.php';

	// Create the array used for auto-completion
	$teams = array('Steelers', 'Seahawks', 'Steel Curtains');

	// Instantiate the HTML_QuickForm class
	$form = new HTML_QuickForm();

	// Create the autocomplete element
	$element =& $form->addElement('autocomplete', 'teams',
		'Favorite Football Team:');

	// Map the array to the autocomplete field
	$element->setOptions($teams);

	// Display the form
	$form->display();
?>
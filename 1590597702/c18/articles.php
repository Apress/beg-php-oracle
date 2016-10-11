<?php

	// Start session
	session_start();

	// Connect to the Oracle database
	$conn = oci_connect('WEBUSER', 'oracle123', '//127.0.0.1/XE')
		or die("Can't connect to database server!");

	// Retrieve requested article id
	$articleid = htmlentities($_GET['id']);

	// User wants to view an article, retrieve it from database
	$query = "SELECT title, content FROM articles WHERE id=:articleid ";
	$stmt = oci_parse($conn, $query);
	oci_bind_by_name($stmt, ':articleid', $articleid);
	oci_execute($stmt);

	// Has a row been returned?
	list($title, $content) = oci_fetch_array($stmt, OCI_NUM);

	// Add article title and link to list
	$articlelink = "<a href='article.php?id=$id'>$title</a>";

	if (! in_array($articlelink, $_SESSION['articles']))
		$_SESSION['articles'][] = $articlelink;

	// Output list of requested articles
	printf("<p>%s</p><p>%s</p>", $title, $content);

	echo "<p>Recently Viewed Articles</p><ul>";
	foreach($_SESSION['articles'] as $doc) printf("<li>%s</li>", $doc);
	echo "</ul>";
?>
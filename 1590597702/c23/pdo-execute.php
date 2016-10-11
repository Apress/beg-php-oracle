<?php
// Connect to the database
$dbh = new PDO("oci:dbname=xe", "chapter23", "secret");
// Create the query
$query = "INSERT INTO products (product_id, sku,title)
VALUES (:productid, :sku,:title)";
// Prepare the query
$stmt = $dbh->prepare($query);
// Execute the query
$stmt->execute(array(':productid' => 6, ':sku' => 'MN873213',
':title' => 'Minty Mouthwash'));
// Execute again
$stmt->execute(array(':productid' => 7, ':sku' => 'AB223234',
':title' => 'Lovable Lipstick'));
?>
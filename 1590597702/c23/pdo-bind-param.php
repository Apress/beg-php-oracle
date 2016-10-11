<?php
// Connect to the database server
$dbh = new PDO("oci:dbname=xe", "chapter23", "secret");
// Create and prepare the query
$query = "INSERT INTO products (product_id, sku,title)
VALUES (:productid, :sku, :title)";
$stmt = $dbh->prepare($query);
// Assign two new variables
$productid = 8;
$sku = 'PO998323';
$title = 'Pretty Perfume';
// Bind the parameters
$stmt->bindParam(':productid', $productid);
$stmt->bindParam(':sku', $sku);
$stmt->bindParam(':title', $title);
// Execute the query
$stmt->execute();
// Assign new variables
$productid = 9;
$sku = 'TP938221';
$title = 'Groovy Gel';

// Bind the parameters
$stmt->bindParam(':productid', $productid);
$stmt->bindParam(':sku', $sku);
$stmt->bindParam(':title', $title);

// Execute again
$stmt->execute();
?>
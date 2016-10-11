<?php
// Connect to the database server
$dbh = new PDO("oci:dbname=xe", "chapter23", "secret");
// Execute the query
$stmt = $dbh->query("SELECT sku, title FROM products ORDER BY title");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
$sku = $row['sku'];
$title = $row['title'];
printf("Product: %s (%s) <br />", $title, $sku);
}
?>
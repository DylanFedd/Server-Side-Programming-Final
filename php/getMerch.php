<?php

require_once "config.php";

$connection = new mysqli($hn, $un, $pw, $db);
if ($connection->connect_error)
{
    die("Failed to load the products page");
}

$query = "SELECT * FROM products";
$result = $connection->query($query);

$products = array();

foreach ($result as $product)
{
    $products[] = $product;
}

echo json_encode($products);


?>
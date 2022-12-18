<?php

require_once "config.php";

$conn = new mysqli($hn, $un, $pw, $db);
if($conn -> connect_error) die("Fatel Error");

if(isset($_POST['UserID'])){
    $sql = "DELETE FROM users WHERE UserID = ?";
    deleteRecord($sql, $conn, $_POST['UserID']);
}

else if(isset($_POST['ProductID'])){
    $sql = "DELETE FROM products WHERE ProductID = ?";
    deleteRecord($sql, $conn, $_POST['ProductID']);
}

else if(isset($_POST['OrderID'])){
    $sql = "DELETE FROM orders WHERE OrderID = ?";
    deleteRecord($sql, $conn, $_POST['OrderID']);
}

else if(isset($_POST['WarehouseID'])){
    $sql = "DELETE FROM warehouses WHERE WarehouseID = ?";
    deleteRecord($sql, $conn, $_POST['WarehouseID']);
}

header('Location: admin.php');

function deleteRecord($sql, $conn, $id)
{
    $delete = $conn -> prepare($sql);
    $delete -> bind_param("i",$id);
    $delete -> execute();
    $delete -> close();
}

$conn -> close();

?>
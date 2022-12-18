<?php

    require_once "config.php";
    require_once "cartproduct.php";
    require_once "checkinput.php";

    session_start();

    $conn = new mysqli($hn, $un, $pw, $db);
    if($conn->connect_error) die("Fatel Error");

    if(isset($_POST['ProductID']))
    {
        $ProductID = get_post($conn, 'ProductID');

        $stmt = $conn -> prepare("SELECT * FROM products WHERE ProductID = ?");
        $stmt -> bind_param("i", $ProductID);

        $stmt -> execute();
        $result = $stmt->get_result();
        $product = $result -> fetch_array(MYSQLI_ASSOC);
        if(!isset($_SESSION["cart"]))
        {
            $_SESSION["cart"] = array();
        }
        if($result -> num_rows > 0)
        {
            $_SESSION["cart"][] = new CartProduct($product);
        }
    }

?>
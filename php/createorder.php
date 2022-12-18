<?php

    require_once "config.php";
    require_once "cartproduct.php";

    session_start();

    $conn = new mysqli($hn, $un, $pw, $db);
    if($conn->connect_error) die("Fatel Error");

    echo "world";

    if(isset($_SESSION['userID']) && 
    isset($_POST['ShippingAddress']) &&
    isset($_POST['PaymentMethod']) &&
    isset($_POST['ShippingMethod']))
    {
        echo "hello";

        $OrderID = null;
        $UserID = $_SESSION['userID'];
        $ShippingAddress = get_post($conn, 'ShippingAddress');
        $PaymentMethod = get_post($conn, 'PaymentMethod');
        $ShippingMethod = get_post($conn, 'ShippingMethod');
        $DateOrdered = date("Y-m-d");

        $stmt = $conn->prepare("INSERT INTO orders VALUES(?,?,?,?,?,?,?)");

        foreach($_SESSION["cart"] as $cartProduct)
        {
            $productID = $CartProduct -> getProductID();
            $stmt -> bind_param("iiissss",$OrderID,$UserID,$ProductID,$ShippingAddress,$ShippingMethod,$DateOrdered);
            $stmt -> execute();
        }
        unset($_SESSION["cart"]);
        $stmt -> close();
        $conn -> close();

    }

    header('Location: ../checkouts.php');
?>
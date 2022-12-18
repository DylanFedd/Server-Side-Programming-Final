<?php

    require_once "config.php";
    require_once "cartproduct.php";
    require_once "checkinput.php";

    session_start();

    $conn = new mysqli($hn, $un, $pw, $db);
    if($conn->connect_error) die("Fatel Error");

    if(isset($_SESSION['userID']) && 
    isset($_SESSION['cart']) &&
    isset($_POST['ShippingAddress']) &&
    isset($_POST['PaymentMethod']) &&
    isset($_POST['ShippingMethod']))
    {
        $orderID = null;
        $userID = $_SESSION['userID'];
        $shippingAddress = get_post($conn, 'ShippingAddress');
        $paymentMethod = get_post($conn, 'PaymentMethod');
        $shippingMethod = get_post($conn, 'ShippingMethod');
        $dateOrdered = date("Y-m-d");

        $stmt = $conn->prepare("INSERT INTO orders VALUES(?,?,?,?,?,?,?)");

        foreach($_SESSION["cart"] as $cartProduct)
        {
            $productID = $cartProduct -> getProductID();
            $stmt -> bind_param("iiissss",$orderID,$userID,$productID,$shippingAddress,$paymentMethod,$shippingMethod,$dateOrdered);
            $stmt -> execute();
        }
        unset($_SESSION["cart"]);
        $stmt -> close();
        $conn -> close();
    }

    header('Location: ../checkouts.php');
?>
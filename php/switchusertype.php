<?php

    require_once "config.php";

    $conn = new mysqli($hn, $un, $pw, $db);
    if($conn -> connect_error) die("Fatel Error");

    if(isset($_POST["UserID"]))
    {
        $userID = $_POST["UserID"];

        $stmt = $conn -> prepare("SELECT UserType FROM users WHERE UserID = ?");
        $stmt -> bind_param("i", $userID);
        $stmt -> execute();
        $result = $stmt -> get_result();
        $stmt -> close();

        $userType = $result -> fetch_array(MYSQLI_ASSOC)["UserType"];

        if($userType == "User")
        {
            $userType = "Admin";
        }
        else
        {
            $userType = "User";
        }

        $stmt = $conn -> prepare("UPDATE users SET UserType = ? WHERE UserID = ?");
        $stmt -> bind_param("si", $userType,$userID);
        $stmt -> execute();
        $stmt -> close();
    }

    header('Location: admin.php');
?>
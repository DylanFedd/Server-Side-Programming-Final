<?php

require_once "config.php";

if(
    isset($_POST['username']) &&
    isset($_POST['password'])
){
    $userName = $_POST['username'];
    $password = $_POST['password'];

    $conn = new mysqli($hn,$un,$pw,$db);

    $query = "SELECT * FROM users WHERE AccountUserName='$userName'";

    $result = $conn->query($query);
    if(!$result)
    {
        die("Database access failed");
    }

    if($result->num_rows==0)
    {
        echo "User Does not exist";
    }

    foreach($result as $item)
    {
        if(password_verify($password,$item['Password']))
        {
            session_start();
            $_SESSION['username'] = $userName;
            $_SESSION['userID'] = $item["UserID"];
            header('Location: ../index.html');
        }
        else
        {
            echo "Incorrect password";
        }
    }
}

?>
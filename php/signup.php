<?php

require_once "config.php";

if(
    isset($_POST['firstname']) && 
    isset($_POST['lastname']) &&
    isset($_POST['username']) &&
    isset($_POST['password'])
){
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $userName = $_POST['username'];
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $id = Null;
    $usertype = "User";

    $conn = new mysqli($hn,$un,$pw,$db);
    if ($conn->connect_error)
    {
        die ("Fatel error on connect");
    }

    $stmt = $conn->prepare('INSERT INTO users VALUES(?,?,?,?,?,?)');

    $stmt->bind_param('ssssss', $id, $firstName, $lastName, $userName, $password, $usertype);

    $stmt->execute();

    $stmt->close();
    $conn->close();

    header('Location: ../signin.html');

}

?>
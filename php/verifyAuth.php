<?php

session_start();

//res = response
$res = Array();

if(isset($_SESSION['username']))
{
    $res['auth'] = true;
    $res['username'] = $_SESSION['username'];
    $res['isAdmin'] = $_SESSION['userType'] == "Admin";
}
else
{
    $res['auth'] = false;
}

echo json_encode($res);

?>
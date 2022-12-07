<?php

session_start();

//res = response
$res = Array();

if(isset($_SESSION['username']))
{
    $res['auth'] = true;
    $res['username'] = $_SESSION['username'];
}
else
{
    $res['auth'] = false;
}

echo json_encode($res);

?>
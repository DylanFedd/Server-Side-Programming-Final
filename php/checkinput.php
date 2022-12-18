<?php

    function get_post($conn,$var)
    {
        $var = htmlentities($_POST[$var]);
        $var = stripslashes($var);
        return $conn->real_escape_string($var);
    }

?>
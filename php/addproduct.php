<?php

    require_once "config.php";
    require_once "checkinput.php";

    $conn = new mysqli($hn, $un, $pw, $db);
    if($conn->connect_error) die("Fatel Error");

    $message = "";

    if(isset($_POST['ProductName']) && 
    isset($_POST['ProductPrice']) &&
    isset($_POST['ProductDescription']) &&
    isset($_POST['InventoryQty']))
    {
        $ProductID = null;
        $ProductName = get_post($conn, 'ProductName');
        $ProductPrice = get_post($conn, 'ProductPrice');
        $ProductDescription = get_post($conn, 'ProductDescription');
        $InventoryQty = get_post($conn, 'InventoryQty');
        $ImgFileName = $_FILES["ImgFile"]["name"];


        $stmt = $conn->prepare("INSERT INTO products VALUES(?,?,?,?,?,?)");
        $stmt->bind_param("isdsis",$ProductID,$ProductName,$ProductPrice,$ProductDescription,$InventoryQty,$ImgFileName);
        $stmt->execute();

        move_uploaded_file($_FILES["ImgFile"]["tmp_name"], "../images/$ImgFileName");

        $message = $stmt->affected_rows." Product added";

    }

?>


<!DOCTYPE html>
<html>

    <head>

        <div><a href="admin.php">Go Back to Admin Page</a></div>

    </head>

    <body>

        <form method="post" action="addproduct.php" enctype="multipart/form-data">
            ProductName: <input type="text" name="ProductName" placeholder="Insert ProductName Here">
            ProductPrice: <input type="text" name="ProductPrice" placeholder="Insert ProductPrice Here">
            ProductDescription: <input type="text" name="ProductDescription" placeholder="Insert ProductDescription Here">
            InventoryQty: <input type="text" name="InventoryQty" placeholder="Insert InventoryQty Here">
            ImgFileName: <input type="file" name="ImgFile" placeholder="Insert ImgFileName Here">
            <input type="submit" value="Add Product">
        </form>

        <p>
            <?= $message ?>
        </p>

    </body>


</html>
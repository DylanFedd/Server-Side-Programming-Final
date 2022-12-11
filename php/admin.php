<?php

require_once "config.php";

$conn = new mysqli($hn, $un, $pw, $db);
if($conn -> connect_error) die("Fatel Error");

$users = getTable("SELECT * from users", $conn);
$products = getTable("SELECT * from products", $conn);
$orders = getTable("SELECT * from orders", $conn);
//$users = getTable("SELECT * from users", $conn);

//gets the data for the tables
function getTable($sql, $conn)
{
    $result = $conn->query($sql);

    $data = array();

    if($result -> num_rows > 0){
        while ($row = $result -> fetch_assoc()){
            $data[] = $row;
        }
    }
    return $data;
}

$conn -> close();

?>


<html>

    <head>
        <title>Admin Page</title>
    </head>

    <body>

        <div><a href="../index.html">Go Back to Home Page</a></div>

        <!-- user table -->
        <table>
            <tr>
                <th>UserID</th>
                <th>UserFirstName</th>
                <th>UserLastName</th>
                <th>AccountUserName</th>
                <th>Password</th>
                <th>UserType</th>
            </tr>
            <?php foreach($users as $user): ?>
            <tr>
                <td><?= $user["UserID"] ?></td>
                <td><?= $user["UserFirstName"] ?></td>
                <td><?= $user["UserLastName"] ?></td>
                <td><?= $user["AccountUserName"] ?></td>
                <td><?= $user["Password"] ?></td>
                <td><?= $user["UserType"] ?></td>
                <td>
                    <form method="post" action="deleteitem.php">
                        <input type="hidden" value="<?= $user["UserID"]?>" name="UserID"/>
                        <button type="sumbit">Delete Record</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>

        <!-- Product table -->
        <table>
            <tr>
                <th>ProductID</th>
                <th>ProductName</th>
                <th>ProductPrice</th>
                <th>ProductDescription</th>
                <th>InventoryQty</th>
                <th>ImgFileName</th>
            </tr>
            <?php foreach($products as $product): ?>
            <tr>
                <td><?= $product["ProductID"] ?></td>
                <td><?= $product["ProductName"] ?></td>
                <td><?= $product["ProductPrice"] ?></td>
                <td><?= $product["ProductDescription"] ?></td>
                <td><?= $product["InventoryQty"] ?></td>
                <td><?= $product["ImgFileName"] ?></td>
                <td>
                    <form method="post" action="deleteitem.php">
                        <input type="hidden" value="<?= $product["ProductID"]?>" name="ProductID"/>
                        <button type="sumbit">Delete Record</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>

        <!-- orders table -->
        <table>
            <tr>
                <th>OrderID</th>
                <th>UserID</th>
                <th>ProductID</th>
                <th>QtyOrdered</th>
                <th>OrderTotal</th>
                <th>ShippingAddress</th>
                <th>PaymentMethod</th>
                <th>ShippingMethod</th>
                <th>DateOrdered</th>
            </tr>
            <?php foreach($orders as $order): ?>
            <tr>
                <td><?= $order["OrderID"] ?></td>
                <td><?= $order["UserID"] ?></td>
                <td><?= $order["ProductID"] ?></td>
                <td><?= $order["QtyOrdered"] ?></td>
                <td><?= $order["OrderTotal"] ?></td>
                <td><?= $order["ShippingAddress"] ?></td>
                <td><?= $order["PaymentMethod"] ?></td>
                <td><?= $order["ShippingMethod"] ?></td>
                <td><?= $order["DateOrdered"] ?></td>
                <td>
                    <form method="post" action="deleteitem.php">
                        <input type="hidden" value="<?= $order["OrderID"]?>" name="OrderID"/>
                        <button type="sumbit">Delete Record</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>

    </body>

</html>
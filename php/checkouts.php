<?php
//get the products set
if (isset($_POST['product'])) 
{
    $product=$_POST['product'];
    $productoutput = "";

    foreach($product as $item)
    {
        $productoutput .= $item . ", ";
    }
}
else $productoutput = "product not set";

//set the first name
if (isset($_POST['firstName'])) $firstName=$_POST['firstName'];
else $firstName = "Fisrt Name not set";

//set the last name
if (isset($_POST['lastName'])) $lastName=$_POST['lastName'];
else $lastName = "Last Name not set";

//set the address
if (isset($_POST['address'])) $address=$_POST['address'];
else $address = "Address not set";

//set the payment method
if (isset($_POST['payment'])) 
{
    $payment=$_POST['payment'];
    $paymentoutput = "";

    foreach($payment as $item)
    {
        $paymentoutput .= $item . ", ";
    }
}
else $paymentoutput = "Payment not set";

//set the shipping method
if (isset($_POST['shipping'])) 
{
    $shipping=$_POST['shipping'];
    $shippingoutput = "";

    foreach($shipping as $item)
    {
        $shippingoutput .= $item . ", ";
    }
}
else $shippingoutput = "Payment not set";

//set the notes
if (isset($_POST['notes'])) $notes=$_POST['notes'];
else $notes = "Notes not set";

?>
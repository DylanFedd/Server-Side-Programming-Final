<?php

    require_once "cartproduct.php";
    session_start();

?>


<!DOCTYPE html>

    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="css/style.css" rel="stylesheet">
            <link href="css/checkouts.css" rel="stylesheet">
        <title>Skylanders | Checkouts</title>
    </head>
    <body>

        <header>
            <span><a href="signup.html">Sign Up</a></span>
            <span><a href="signin.html">Sign In</a></span>
            <div id="content"></div>
            <input type="button" value="Sign Out" id="signOutBtn" hidden>
        </header>

        <img id="logo_img" src="images/Skylanders_Logo.webp"/>
        <nav>
            <a id ="navicon" href="#"><img src="../images/navicon.png"/></a>
            <ul class="nav_menu">
                <li class="active"><a href="index.html">Home</a></li>
                <li><a href="merch.html">Merchandise</a></li>
                <li><a href="checkouts.php">Checkouts</a></li>
                <li><a href="about.html">About</a></li> 
            </ul>
        </nav>

        <section>
    
                <form method="post" action="php/createorder.php">
                    <label>What is your shipping address? </br>
                    <input type="text" name="address" autocomplete="off" placeholder="ST Address Here"> </br> </label>
    
                    <label>What is your preferred payment method? </br>
                    <select name="payment[]" size="1">
                        <option value="Visa"> Visa </option>
                        <option value="Paypal"> Paypal </option>
                    </select> </br> </label>
    
                    <label>What is your preferred shipping method? </br>
                    <select name="shipping[]" size="1">
                        <option value="normal Shipping"> normal Shipping </option>
                        <option value="fast shipping"> fast shipping </option>
                        <option value="safe shipping"> safe shipping </option></label>
                    </select> </br>
    
                    </br>
    
                    <div id="current_date"></p>
                        <input type="submit" value="Submit"> </br>
                    </div>
                </from>
                
                <div id="cart">
                    <?php if(isset($_SESSION["cart"])): ?>
                        <?php foreach($_SESSION["cart"] as $cartItem): ?>
                            <div class="cartItem">
                                <hi><?= $cartItem -> getProductName()?></hi>
                                <img src="images/<?= $cartItem -> getImgFileName() ?>" />
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
        </section>

        <script src="js/login.js"></script>

    </body>
</html>
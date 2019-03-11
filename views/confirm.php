<?php
session_start();
$shopping_cart = $_SESSION['shopping_cart'];
$user_details = $_SESSION['user_details'];
require("../includes_partials/functions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhaijaan|Exo+2|KoHo|Quicksand" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <title>Shopping furnS</title>
</head>
<body>
    <header class="header">  
        <div class="page-title">
            <a href="../index.php"><h1>furnS</h1></a>
        </div>

        <div class="header-buttons">
            <div class="header-links">
            <?php if (empty ($_SESSION["username"])) { 
            ?> <a class="register-button" href="register.php">register</a> 
            <?php } ?>

            <?php if (isset ($_SESSION["username"])) { 
            ?> <p class="logged-in">Logged in as: <?php echo $_SESSION["username"]; ?></p>
            <?php } else { ?> <a class="login-button" href="login.php">login</a> 
            <?php } ?>

            <?php if (isset ($_SESSION["username"])) { 
            ?> <a class="logout-button" href="logout.php">logout <i class="fas fa-user"></i></a> 
            <?php } ?>

            <?php if (isset ($_SESSION["username"])) { 
            ?> <a class="checkout-button" href="../index.php">continue shopping <i class="fas fa-shopping-basket"></i></a> 
            <?php } ?>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="content-confirm">
            <h2 class="h2-cart">Confirm user details and shopping cart</h2>
            <div class="row-confirm">

                <?php foreach($user_details as $key=>$value){?>
                    <div class="col-text">
                        <p class="user"><?php echo $user_details[$key]["first_name"] . " " . $user_details[$key]["last_name"]; ?></p>
                        <p class="user"><?php echo $user_details[$key]["address"]; ?></p>
                        <p class="user"><?php echo $user_details[$key]["post_code"]; ?></p>
                        <p class="user"><?php echo $user_details[$key]["county"]; ?></p>
                        <p class="user"><?php echo $user_details[$key]["email"]; ?></p>
                    </div>
                <?php } ?>

                
                <div class="col-cart">
                    <?php foreach($shopping_cart as $key=>$value){?>
                        <div class="row-text">
                            <p class="cart"><?php echo $shopping_cart[$key]["quantity"]; ?></p>
                            <p class="cart"><?php echo $shopping_cart[$key]["product_name"]; ?></p>
                            <?php $price = $shopping_cart[$key]["price"]; $quantity = $shopping_cart[$key]["quantity"];
                            $total_price = calculate_price($price, $quantity); ?>
                            <p class="cart">Total price: <?php echo $total_price; ?> SEK</p>
                            <?php  $collected_prices += $total_price; ?>
                        </div>
                    <?php } ?>

                    <h2 class="total-sum-top">Total order value</h2>
                    <h2 class="total-sum"><?php echo $collected_prices; ?> SEK</h2>
                </div>          
            </div>
                <div class="go-to-confirm">
                    <a class="confirm-order" href="complete_logout.php">Confirm order</a>
                </div>
        </div>
    </div>

    <footer></footer>
    
</body>
</html>
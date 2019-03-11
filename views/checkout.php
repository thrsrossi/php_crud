<?php
session_start();
$shopping_cart = $_SESSION['shopping_cart'];
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

    <div class="row-container">
        <div class="row-content">
            <h2 class="h2-cart">Shopping cart</h2>
                <div class="row-products">

                    <?php foreach($shopping_cart as $key=>$value){ ?>
                    <form class="display-row" action="remove.php" method="POST">
                        <span class="prod-name"><input type="hidden" value="<?php echo $shopping_cart[$key]["product_name"]; ?>" name="name"><?php echo $shopping_cart[$key]["product_name"]; ?></span>
                        <span class="prod-price"><input type="hidden" value="<?php echo $shopping_cart[$key]["price"]; ?>" name="price"><?php echo $shopping_cart[$key]["price"]. " SEK"; ?></span>
                        <span class="prod-quantity"><input type="hidden" value="<?php echo $shopping_cart[$key]["quantity"]; ?>" name="quantity"><?php echo "Quantity: " .$shopping_cart[$key]["quantity"]; ?></span>
                        <span class="prod-total-price"><p>Total price: <?php $price = $shopping_cart[$key]["price"]; $quantity = $shopping_cart[$key]["quantity"]; $total_price = calculate_price($price, $quantity); echo $total_price; ?> SEK</p></span>
                        <?php  $collected_prices += $total_price; ?>
                        <div class="add-remove-cart"><button type="submit" name="add-button" value="add" class="hover"><i class="fas fa-plus"></i></button></div>
                        <div class="add-remove-cart"><button type="submit" name="remove-button" value="remove" class="hover" ><i class="fas fa-minus"></i></button></div>
                        <div class="add-remove-cart"><button type="submit" name="remove-all-button" value="remove-all" class="hover" ><i class="fas fa-trash-alt"></i></button></div>
                    </form>
                    <?php } ?>

                    <h2 class="total-sum-top">Total order value</h2>
                    <h2 class="total-sum"><?php echo $collected_prices; ?> SEK</h2>

                    <div class="go-to-confirm">
                        <a class="confirm-order" href="confirm_sql.php">Verify order details and confirm order</a>
                    </div>

                </div>
        </div>
    </div>
    
<footer></footer>

    
</body>
</html>
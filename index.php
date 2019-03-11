<?php
session_start();
require("includes_partials/products.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Baloo+Bhaijaan|Exo+2|KoHo|Quicksand" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <title>Shopping furnS</title>
</head>
<body>
  <header class="header">  

    <div class="page-title">
      <h1>furnS</h1>
    </div>

    <div class="header-buttons">
      <div class="header-links">
        <?php if (empty ($_SESSION["username"])) { ?> 
        <a class="register-button" href="views/register.php">register</a> 
        <?php } ?>

        <?php if (isset ($_SESSION["username"])) { ?> 
        <p class="logged-in">Logged in as: <?php echo $_SESSION["username"]; ?></p>
        <?php } else { ?> <a class="login-button" href="views/login.php">login</a> 
        <?php } ?>

        <?php if (isset ($_SESSION["username"])) { ?> 
        <a class="logout-button" href="views/logout.php">logout <i class="fas fa-user"></i></a> 
        <?php } ?>

        <?php if (isset ($_SESSION["username"])) { ?> 
        <a class="checkout-button" href="views/checkout_sql.php">view cart <i class="fas fa-shopping-basket"></i></a> 
        <?php } ?>
      </div>
    </div>
  </header>


  <div class="container">

    <div class="content">
      <p style="font-family: 'Exo 2', sans-serif;margin: 1em 0;"> <?php echo (isset($_GET['registered_failed']))?"You need to be registered and logged in to be able to add products to cart":"</br>"; ?></p>
        <div class="products">

          <?php foreach($products as $key=>$value){ ?>
            <div class="row">
              <form action="views/posting_cart.php" method="POST">
                <div class="product-name"><input type="hidden" value="<?php echo $products[$key]["name"]; ?>" name="name"><?php echo $products[$key]["name"]; ?></div>
                <div class="product-price"><input type="hidden" value="<?php echo $products[$key]["price"]; ?>" name="price"><?php echo $products[$key]["price"]. " SEK"; ?></div>
                <div class="adding-to-cart"><input type="text" class="product-quantity" name="quantity" value="1" size="3" /><input type="submit" value="Add to Cart" class="add-to-cart" /></div>
              </form>
            </div>
          <?php } ?>

        </div>
    </div>
  </div>

<footer></footer>
  
</body>
</html>


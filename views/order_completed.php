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
                <?php if (empty ($_SESSION["username"])) { ?> 
                <a class="register-button" href="register.php">register</a> 
                <?php } ?>

                <?php if (isset ($_SESSION["username"])) { ?> 
                <p class="logged-in">Logged in as: <?php echo $_SESSION["username"]; ?></p>
                <?php } else { ?> <a class="login-button" href="login.php">login</a> 
                <?php } ?>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="thanks-content">
            <div class="thank-you-message-box">
                <h2 class="thank-you-h2">Thank you for your order!</h2>
                    <p class="thank-you-text">Your order has been transmitted successfully. We will send you an email as soon as your products have been packed and shipped.</p>
                    <p class="thank-you-text">Hope to see you again soon!</p>
                    <p class="contact-email">If you have any questions or comments regarding your order or our company, don't hesitate to contact us at shop@email.com</p>
            </div>
        </div>
    </div>
    
    <footer></footer>
    
</body>
</html>
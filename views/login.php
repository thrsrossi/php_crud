<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Baloo+Bhaijaan|Exo+2|KoHo|Quicksand" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/style.css">
  <title>Shopping furnS</title>
</head>
<body>
  <header class="header">  
    <div class="page-title">
      <a href="../index.php"><h1>furnS</h1></a>
    </div>
  </header>

  <div class="container">
    <div class="content-reg">
        <div class="login-form">
          <h2>Login</h2>
          <form action="login_sql.php" method="POST">
            <label for="login_username">Username</label>
            <input type="text" name="username" id="login_username">
            <label for="login_password">Password</label>
            <input type="password" name="password" id="login_password">
            <input type="submit" value="Login">
            <p> <?php echo (isset($_GET['login_failed']))?"Username and/or password is incorrect. Please try again or register if you are a new user.":"</br>"; ?></p>
          </form>
      </div>
    </div>
  </div>

<footer></footer>
  
</body>
</html>

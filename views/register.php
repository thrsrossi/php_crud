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

      <div class="register-form">
        <h2>Register new user</h2>
        <form action="register_sql.php" method="POST">
          <label for="register_first_name">First name:</label>
          <input type="text" name="first_name" id="register_first_name" required="true">
          <label for="register_last_name">Last name:</label>
          <input type="text" name="last_name" id="register_last_name" required="true">
          <label for="register_address">Address:</label>
          <input type="text" name="address" id="register_address" required="true">
          <label for="register_post_code">Post code:</label>
          <input type="text" name="post_code" id="register_post_code" required="true">
          <label for="register_county">County:</label>
          <input type="text" name="county" id="register_county" required="true">
          <label for="register_email">Email:</label>
          <input type="email" name="email" id="register_email" required="true">
          <label for="register_username">Username:</label>
          <input type="text" name="username" id="register_username" required="true">
          <label for="register_password">Password:</label>
          <input type="password" name="password" id="register_password" required="true">
          <input type="submit" value="Register">
        </form>
      </div>
    </div>
</div>

<footer></footer>
  
</body>
</html>


<?php
session_start();
require("../includes_partials/database_connection.php");


$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$address = $_POST["address"];
$post_code = $_POST["post_code"];
$county = $_POST["county"];
$email = $_POST["email"];
$username = $_POST["username"];
$password = $_POST["password"];

//stores password as cryptated in database
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

//stores user info in database
$statement = $pdo->prepare("INSERT INTO users (username, password, first_name, last_name, address, post_code, county, email) VALUES (:username, :password, :first_name, :last_name, :address, :post_code, :county, :email)");
$statement->execute([":username" => $username,":password" => $hashed_password, ":first_name" => $first_name, ":last_name" => $last_name, ":address" => $address, ":post_code" => $post_code, ":county" => $county, ":email" => $email]);


header('Location: ../index.php');




?>
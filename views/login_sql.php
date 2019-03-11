<?php

session_start();
require("../includes_partials/database_connection.php");

$username = $_POST["username"];
$password = $_POST["password"];

//gets username if entered in form
$statement = $pdo->prepare("SELECT * FROM users WHERE username = :username");

$statement->execute([":username" => $username]);
//stores username in variable
$fetched_user = $statement->fetch();

//checks if password is correct to fetched user
$is_password_correct = password_verify($password, $fetched_user["password"]);

//if password and username matches, log in and return to index.php
if ($is_password_correct) {
    $_SESSION["username"] = $fetched_user["username"];
    $_SESSION["id"] = $fetched_user["id"];
    header('Location: ../index.php');
    //if wrong password, populate get to print message on login.php
} else {
    header('Location: login.php?login_failed=true');
}

?>

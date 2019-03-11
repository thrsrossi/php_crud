<?php
session_start();
require("../includes_partials/database_connection.php");

//gets user information stored in session
$bought_by = $_SESSION["id"];

//gets all items in cart of logged in user
$statement = $pdo->prepare("SELECT * FROM cart WHERE ordered_by = :id");
$statement->execute([":id" => $bought_by]);

//stores cart in array
$shopping_cart = $statement->fetchAll(PDO::FETCH_ASSOC);
$_SESSION['shopping_cart'] = $shopping_cart;



//gets delivery information from logged in user
$statement = $pdo->prepare("SELECT first_name, last_name, address, post_code, county, email FROM users WHERE id = :id");
$statement->execute([":id" => $bought_by]);

//stores information in array
$user_details = $statement->fetchAll(PDO::FETCH_ASSOC);
$_SESSION['user_details'] = $user_details;


header('Location: confirm.php');

?>
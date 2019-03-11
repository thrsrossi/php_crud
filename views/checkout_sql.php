<?php
session_start();
require("../includes_partials/database_connection.php");

//finds logged in user id
$bought_by = $_SESSION["id"];

//gets all products from that user
$statement = $pdo->prepare("SELECT * FROM cart WHERE ordered_by = :id");
$statement->execute([":id" => $bought_by]);

//creates associative array of products and stores in variable to use on next page
$shopping_cart = $statement->fetchAll(PDO::FETCH_ASSOC);
$_SESSION['shopping_cart'] = $shopping_cart;

header('Location: checkout.php');

?>
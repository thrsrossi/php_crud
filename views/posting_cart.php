<?php
session_start();
require("../includes_partials/database_connection.php");


$product_name = $_POST["name"];
$price = $_POST["price"];
$quantity = $_POST["quantity"];


//if user is logged in, save user id and use to add the products to the right user in database
if (isset ($_SESSION["username"])){
$user_id = $_SESSION["id"];


//gets number of rows in database, if any, with the name of the product chosen
$statement = $pdo->prepare("SELECT COUNT(product_name) AS number_of_products FROM cart WHERE product_name = :product_name AND ordered_by = :id");
$statement->execute([":product_name" => $product_name, ":id" => $user_id]);

$fetched_row = $statement->fetch();

//if product exists, update the quantity of that row instead of adding duplicate rows
if ((int)$fetched_row["number_of_products"] >= 1) {
    $statement = $pdo->prepare("UPDATE cart SET quantity = quantity + :quantity WHERE product_name = :product_name AND ordered_by = :id");
    $statement->execute([":quantity" => (int)$quantity, ":product_name" => $product_name, ":id" => $user_id]);

    //if row does not exists and product has not been shosen before - add new row with product details
} else {
    $statement = $pdo->prepare("INSERT INTO cart (product_name, price, quantity, ordered_by) VALUES (:product_name, :price, :quantity, :ordered_by)");
    $statement->execute([":product_name" => $product_name, ":price" => $price, ":quantity" => $quantity, ":ordered_by" => $user_id]);
}

header('Location: ../index.php');
//if user not logged in populate get and show error message
} else if (empty ($_SESSION["username"])) {
    header('Location: ../index.php?registered_failed=true');
}


?>
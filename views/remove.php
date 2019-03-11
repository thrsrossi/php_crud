<?php
session_start();
require("../includes_partials/database_connection.php");


$bought_by = $_SESSION["id"];
$product_name = $_POST["name"];
$quantity = $_POST["quantity"];


//if quantity gets under 0 when removing products, delete whole row instead of getting negative value
if ($quantity < 1) {
    $statement = $pdo->prepare("DELETE FROM cart WHERE product_name = :product_name AND ordered_by = :id");
    $statement->execute([":product_name" => $product_name, ":id" => $bought_by]);
}


//the ifs checks which button was clicked and executes accordingly
if (isset($_POST['add-button'])) {
    
    //adds one product to database
    $statement = $pdo->prepare("UPDATE cart SET quantity = quantity +1 WHERE product_name = :product_name AND ordered_by = :id");
    $statement->execute([":product_name" => $product_name, ":id" => $bought_by]);

} else if (isset($_POST['remove-button'])) {

    //removes one product from database
    $statement = $pdo->prepare("UPDATE cart SET quantity = quantity -1 WHERE product_name = :product_name AND ordered_by = :id");
    $statement->execute([":product_name" => $product_name, ":id" => $bought_by]);
    
} else if (isset($_POST['remove-all-button'])) {
    
    //removes whole quantity of product and deletes row in database
    $statement = $pdo->prepare("DELETE FROM cart WHERE product_name = :product_name AND ordered_by = :id");
    $statement->execute([":product_name" => $product_name, ":id" => $bought_by]);
}



//getting the whole updated cart from user in order to display current values after executing any of the above
$statement = $pdo->prepare("SELECT * FROM cart WHERE ordered_by = :id");
$statement->execute([":id" => $bought_by]);

//storing updated cart in variable to use in checkout.php again
$shopping_cart = $statement->fetchAll(PDO::FETCH_ASSOC);
$_SESSION['shopping_cart'] = $shopping_cart;


header('Location: checkout.php');

?>

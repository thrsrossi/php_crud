<?php
session_start();
session_destroy();
require("../includes_partials/database_connection.php");

$bought_by = $_SESSION["id"];


//deletes everything from cart from current user when order is submitted
$statement = $pdo->prepare("DELETE FROM cart WHERE ordered_by = :id");
$statement->execute([":id" => $bought_by]);


header('Location: order_completed.php');

?>
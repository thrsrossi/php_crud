<?php

$pdo = new PDO(
  "mysql:host=localhost;dbname=shop;charset=utf8",
  "root",
  "root",
  [
    "PDO::ATTR_ERRMODE" => PDO::ERRMODE_EXCEPTION
  ]
);

?>
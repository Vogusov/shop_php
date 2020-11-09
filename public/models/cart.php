<?php

$title = 'Корзина';
$content = 'templates/cart.php';
$header = 'templates/header.php';
$footer = 'templates/footer.php';

if (isset($_GET['id'])) {
  echo $id = $_GET['id'];
  addToCart($link, $id);
}
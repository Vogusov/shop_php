<?php

$title = 'Корзина';
$content = 'templates/cart.php';
$header = 'templates/header.php';
$footer = 'templates/footer.php';



if (isset($_POST['ID'])) {
  $product_id = $_POST['ID'];
  $session_id = session_id();
  addToCart($link, $product_id, $session_id);
}

<?php

$title = 'Страница товара';
$content = 'templates/product.php';

if (isset($_GET['id']))
  $id = $_GET['id'];

$header = 'templates/header.php';
$footer = 'templates/footer.php';
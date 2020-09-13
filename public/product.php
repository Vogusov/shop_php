<?php
$title = "Страница товара";
$content = "templates/product.php";
$id = $_GET['id'];

$header = "templates/header.php";
$footer = "templates/footer.php";

include "models/model.php";
include "templates/main.php";
<?php
$title = "Админка. Редактирование товара";
$header = "templates/header.php";
$footer = "templates/footer.php";

include "models/model.php";


// редактирование или удаление товара из админки:
if (isset ($_GET['action'])) {
  $action = $_GET['action'];

  if (isset ($_GET['id']))
    $id = $_GET['id'];

  // если редактирование, то переадресация на страницу редактирования.
  if ($action == 'edit') {
    $content = "templates/admin-edit-product.php";
  } elseif ($action == 'delete') {

    // запрос к БД на удаление:
    $content = "templates/admin.php";
    $product = getProductById($link, $id);
    echo deleteGoodsFromDB($link, $id) . "товар id=$id, {$product['name']} удален из БД";
  }
}


// со страницы редактирования товара запрос на изменение:
elseif (isset ($_POST['edit-product'])) {
  $action = $_POST['edit-product'];
  if (isset ($_POST['product-id'])) {
    $id = $_POST['product-id'];
    $content = "templates/admin.php";
    $product = getProductById($link, $id);
    echo 'Successfully edited' . editProductInDB($link, $_POST['product-id'], $_POST['product-name'], $_POST['product-price'], $_POST['product-description']) . ' product. <a href="admin.php">Back</a>';

  }
// todo: сделать редактирование товара с загрузкой фото!!!

} else {
  echo "что-то не так!";
}


include "templates/main.php";
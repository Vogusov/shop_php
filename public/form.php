<?php
include "models/model.php";
include "config/config-db.php";

if (isset($_POST['post_comment'])) {
  saveCommentToDb($link, null, strip_tags(trim($_POST['name'])), strip_tags(trim($_POST['text'])), date("d.F.Y H:i:s"), strip_tags(trim($_POST['email'])));

} elseif (isset($_POST['edit'])) {
  $action = $_POST['edit'];
  if ($action) {
    echo 'Successfully edited'.editProduct($link, $_POST['product-id'], $_POST['product-name'], $_POST['product-price'], $_POST['product-description']).' product. <a href="admin.php">Back</a>';
// todo: сделать редактирование товара с загрузкой фото!!!
  }
} else {
  echo "что-то не так!";
}



<?php
include "config/config-db.php";


/* Каталог: */

/*Получение массива со всеми товарами*/
function getGoods($link, $order = 'asc') {
  $query = "select * from `goods` order by `id` $order";
  $result = mysqli_query($link, $query);
  if (!$result)
    die(mysqli_error($link));

  $rows = mysqli_num_rows($result);
  $goods = [];

  for ($i = 0; $i < $rows; $i++) {
    $row = mysqli_fetch_assoc($result);
    $goods[] = $row;
  }
  return $goods;
//  while ($product = mysqli_fetch_assoc($result)){
//    $goods[] = $product;
//  }
}


/*Получение данных одного товара по id*/
function getProductById($link, $id) {
  $query = "select * from `goods` where `id` = $id";
  $result = mysqli_query($link, $query);
  if (!$result)
    die(mysqli_error($link));
  $product = mysqli_fetch_assoc($result);
  return $product;
}


/* Подсчет товаров */
function countGoods($link) {
  $query = 'select count(`id`) as count from `goods`';
  $result = mysqli_query($link, $query);
  if (!$result)
    die(mysqli_error($link));
  $goodsCount = mysqli_fetch_row($result);
  return $goodsCount[0];
}


/* Отзывы: */

/* Получение всех комментариев */
function getAllComments($link) {
  $query = "select * from `comments` order by `id` desc";
  $result = mysqli_query($link, $query);
  if (!$result)
    die(mysqli_error($link));
  while ($comment = mysqli_fetch_assoc($result)) {
    $comments[] = $comment;
  }
  return $comments;
}


/* Запись комментария в БД */
function saveCommentToDb($link, $id, $user_name, $comment, $date, $email) {
  $str = "insert into `comments` (`id`, `user_name`, `comment`, `date`, `email`) values (null, '%s', '%s', '%s', '%s')";
  $query = sprintf($str, mysqli_escape_string($link, $user_name), mysqli_escape_string($link, $comment), mysqli_escape_string($link, $date), mysqli_escape_string($link, $email));
  $result = mysqli_query($link, $query);

  if (!$result)
    die(mysqli_error($link));

  echo "Ваш комментарий успешно опубликован</br>";
  echo "<a href='comments.php'>Назад к отзывам.</a>";
}

//  if (!$result) {
//    die(mysqli_error($link));
//  } else {
//    header ("Location: comments.php");
//  }
//}


/*-- Админка --*/

/* Удаление товара из БД */

function deleteGoodsFromDB($link, int $id) {
  $id = (int)$id;
  if (!$id)
    return false;

  $query = sprintf("DELETE FROM `goods` where id='$id'");
  $result = mysqli_query($link, $query);

  if (!$result) die (mysqli_error($link));
  return mysqli_affected_rows($link);
}


/* Изменение товара в БД */

function editProductInDB($link, $id, $name, $price, $description, $img_name) {
  $id = (int)$id;
  $str = "update `goods` set name='%s', price='%d', description='%s', img_name='%s' where id='$id'";
  $query = sprintf($str, mysqli_escape_string($link, $name), mysqli_escape_string($link, $price), mysqli_escape_string($link, $description), mysqli_escape_string($link, $img_name));
  $result = mysqli_query($link, $query);

  if (!$result) die (mysqli_error($link));
  return mysqli_affected_rows($link);
}


/*Создания нового товара*/

function addNewProductToDB($link, $name, $price, $description, $img_name) {
  $str = "insert into `goods` (`name`, `price`, `description`, `img_name`) values ('%s', '%d', '%s', '%s')";
  $query = sprintf($str, mysqli_escape_string($link, $name), mysqli_escape_string($link, $price), mysqli_escape_string($link, $description), mysqli_escape_string($link, $img_name));
  $result = mysqli_query($link, $query);

  if (!$result) die (mysqli_error($link));
  return mysqli_affected_rows($link);
}





/*-- Регистрация, авторизация --*/
// todo: сделать проверку на единство пары Логин-Пароль при регистрации и в БД;
function authorize($link, $login, $pass, $remember) {
  $query = "select `id`, `role` from `users` where `login` = '$login' and `password` = '$pass'";
  $result = mysqli_query($link, $query) or die('Error in auth request: ' . mysqli_error($link));
  if (!$result) die (mysqli_error($link));

  $userData = mysqli_fetch_assoc($result);
  $role = $userData['role'];

//  if($remember){
    if(mysqli_num_rows($result) == 1){
      setcookie('login', $login);
      setcookie('pass', $pass);
      setcookie('role', $role);
      header('Location: registration.php?success&remember');
    } else {
      echo "Вы не зарегистрированны. Зарегистрируйтесь";
    }
//  } else {
//    header('Location: registration.php?success');
//  }

  return $userData;
}





/*-- Корзина --*/

/* Добавить в корзину (в БД) */
function addToCart($link, $id) {
  $query = "insert into `cart` (`id_product`) value ('$id')";
//  $query = sprintf($str, mysqli_escape_string($link, $id), 1);
  $result = mysqli_query($link, $query);

  if (!$result) die (mysqli_error($link));
  return mysqli_affected_rows($link);
}


/* Показать все товары из корзины */
function getGoodsFromCart($link) {
  $query = "select `id` from `cart`";
  $result = mysqli_query($link, $query);
  if (!$result)
    die(mysqli_error($link));

  $rows = mysqli_num_rows($result);
  $goods = [];

  for ($i = 0; $i < $rows; $i++) {
    $row = mysqli_fetch_assoc($result);
    $goods[] = $row;
  }
  return $goods;
}
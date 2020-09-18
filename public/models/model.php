<?php
include "config/config-db.php";



  /* Каталог: */

/*Получение массива со всеми товарами*/
function getGoods($link)
{
  $query = "select * from `goods`";
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
function getProductById($link, $id)
{
  $query = "select * from `goods` where `id` = $id";
  $result = mysqli_query($link, $query);
  if (!$result)
    die(mysqli_error($link));
  $product = mysqli_fetch_assoc($result);
  return $product;
}



  /* Отзывы: */

/* Получение всех отзывов */
function getAllComments($link)
{
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
function saveCommentToDb($link, $id, $user_name, $comment, $date, $phone)
{
  $str = "insert into `comments` (`id`, `user_name`, `comment`, `date`, `phone`) values (null, '%s', '%s', '%s', '%s')";
  $query = sprintf($str, mysqli_escape_string($link, $user_name), mysqli_escape_string($link, $comment), mysqli_escape_string($link, $date), mysqli_escape_string($link, $phone));
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



  /* Админка */

/* Удаление товара из БД */
function deleteGoods($link, $id){
  $id = (int)$id;
  if ($id == 0)
    return false;

  $query = sprintf("DELETE FROM 'goods' where id='$id'");
  $result = mysqli_query($link, $query);

  if(!result) die (mysqli_error($link));
  return mysqli_affected_rows('$link');
}


/* Изменение товара в БД */

function editProduct($link, $id, $name, $price, $description, $img_name, $img_location, $img_sm_location) {
  $id = (int)$id;
  $str = "update `goods` set name='%s', price='%d', description='%s', img_name='%s', img_location='%s', img_sm_location='%s'";
  $query = sprintf($str, mysqli_escape_string($link, $id), mysqli_escape_string($link, $name), mysqli_escape_string($link, $price), mysqli_escape_string($link, $description), mysqli_escape_string($link, $img_name), mysqli_escape_string($link, $img_location), mysqli_escape_string($link, $img_sm_location));
  $result = mysqli_query($link, $query);

  if (!result) die (mysqli_error($link));
  return mysqli_affected_rows('$link');
}

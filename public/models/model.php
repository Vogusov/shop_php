<?php
include "config/config-db.php";


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
function saveCommentToDb($link, $user_name, $comment, $date, $phone)
{
  $str =  "insert into `comments` (`user_name`, `comment`, `date`, `phone`) values ('%s', '%s', '%s', '%s')";
  $query = sprintf($str, mysqli_escape_string($link, $user_name), mysqli_escape_string($link, $comment), mysqli_escape_string($link, $date), mysqli_escape_string($link, $phone));
  $result = mysqli_query($link, $query);

  if (!$result)
    die(mysqli_error($link));

  echo "Комментарий опубликован";
}

<?php
/* ПЕРЕМЕННЫЕ */
$session_id = session_id();

/* ПУБЛИКАЦИЯ ОТЗЫВОВ: */
if (isset($_POST['post_comment'])) {
  saveCommentToDb($link, null, strip_tags(trim($_POST['name'])), strip_tags(trim($_POST['text'])), date("d.F.Y H:i:s"), strip_tags(trim($_POST['email'])));
}


/* АВТОРИЗАЦИЯ ПОЛЬЗОВАТЕЛЕЙ: */
if (isset($_POST['login'])) {
  $login = strip_tags(trim($_POST['login']));
  $pass = isset($_POST['pass']) ? md5(SALT . strip_tags(trim($_POST['pass'])) . SALT) : "";
  $remember = $_POST['remember-me'];

  $userData = authorize($link, $login, $pass);
  $role = $userData['role'];

//  if(mysqli_num_rows($result) == 1){
//    setcookie('login', $login);
//    setcookie('pass', $pass);
//    setcookie('role', $role);
//    header('Location: registration.php?success');
//  } else {
//    echo "Вы не зарегистрированны. Зарегистрируйтесь";
//  }
}


/* КОРЗИНА */

/* смотрим, какой ACTION приходит с фронтенда */
if (isset($_POST['ACTION'])) {
  $action = $_POST['ACTION'];
  switch ($action) {


    /* добавление в корзину */
    case 'add':
      if (isset($_POST['ID'])) {
        $product_id = $_POST['ID'];
        echo addToCart($link, $product_id, $session_id);
      }
      break;


    /* изменение колличества */
    case 'change':
      if (isset($_POST['PROD_ID']))
        $product_id = $_POST['PROD_ID'];
      if (isset($_POST['SIGN']))
        $sign = $_POST['SIGN'];
      if (isset($_POST['QNT']))
        $quantity = (int)$_POST['QNT'];

      // В зависимости от знака, производим операции
      switch ($sign) {
        case '+':
          if (addToCart($link, $product_id, $session_id)) {
            echo ++$quantity;
          } else {
            echo $quantity;
          }
          break;
        case '-':
          // если товар один в корзине, то удаляем его
          if ($quantity === 1) {
            deleteFromCart($link, $product_id, $session_id);
            echo "0";
            // если товар не один, то уменьшаем на 1
          } elseif ($quantity > 1) {
            if (reduceInCart($link, $product_id, $session_id)) {
              echo --$quantity;
            } else {
              echo $quantity;
            }
          }
          break;
      }

      break;


    /* удаление товара из корзины */
    case 'delete':
      if (isset($_POST['ID'])) {
        $product_id = $_POST['ID'];
        echo deleteFromCart($link, $product_id, $session_id);
      }
      break;
  }
}
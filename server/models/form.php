<?php
/* ПЕРЕМЕННЫЕ */
$session_id = session_id();

/* ПУБЛИКАЦИЯ ОТЗЫВОВ: */
if (isset($_POST['post_comment'])) {
  $user_id = (int)strip_tags(trim($_COOKIE['user_id']));
  $comment = strip_tags(trim($_POST['comment']));

  if (saveCommentToDb($link, $user_id, $comment)) {
    header('Location: comments.php?posted');
  }
}




/* АВТОРИЗАЦИЯ ПОЛЬЗОВАТЕЛЕЙ: */

/* Регистрация */
if (isset($_POST['regist'])) {
  $login = strip_tags(trim($_POST['login']));
  $name = strip_tags(trim($_POST['name']));
  $password = md5(SALT . strip_tags(trim($_POST['password'])) . SALT);
  $email = strip_tags(trim($_POST['email']));
  $phone = strip_tags(trim($_POST['phone']));

  if(registrate($link, $login, $name, $password, $email, $phone)){
    header('Location: authorization.php?success');
  }
}


/* авторизация */
if (isset($_POST['auth'])) {
  $login = strip_tags(trim($_POST['login'])) ?? "";
  $passUnhash = $_POST['pass'] ?? null;
  $pass = isset($_POST['pass']) ? md5(SALT . strip_tags(trim($_POST['pass'])) . SALT) : "";

  $userData = authorize($link, $login, $pass);
  if ($userData) {
    $role = $userData['role'];
    $id = $userData['id'];
    $name = $userData['name'];
    $email = $userData['email'];
    $phone = $userData['phone'];
    setcookie('user_id', $id, time()+3600*24*7, '/');
    setcookie('login', $login, time()+3600*24*7, '/');
    setcookie('pass', $pass, time()+3600*24*7, '/');
    setcookie('pass_unhash', $passUnhash, time()+3600*24*7, '/');
    setcookie('role', $role, time()+3600*24*7, '/');
    setcookie('name', $name, time()+3600*24*7, '/');
    setcookie('email', $email, time()+3600*24*7, '/');
    setcookie('phone', $phone, time()+3600*24*7, '/');
    header('Location: account.php');
  } else {
    echo "Вы не зарегистрированны. Зарегистрируйтесь";
  }
}

/* Выход из аккаунта */
if (isset($_POST['exit'])){
  setcookie('login', null, time()-3600*24*8, '/');
  setcookie('pass', null, time()-3600*24*8, '/');
  setcookie('pass_unhash', null, -3600*24*8, '/');
  setcookie('role', null, time()-3600*24*8, '/');
  setcookie('name', null, time()-3600*24*7, '/');
  header('Location: authorization.php');
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

      /* В зависимости от знака, производим операции */
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


/* ОФОРМЛЕНИЕ ЗАКАЗА */

if (isset($_POST['form-order'])) {
  $name = strip_tags(trim($_POST['name']));
  $phone = strip_tags(trim($_POST['phone']));
  $name ? $_SESSION['customer_name'] = $name : $_SESSION['customer_name'];
  $phone ? $_SESSION['customer_phone'] = $phone : $_SESSION['customer_phone'];
  isset($_POST['add-info']) ? $addInfo = strip_tags(trim($_POST['add-info'])) : $addInfo = null;
//  echo $name;
//  echo $phone;
//  echo $addInfo;
  $cart = getGoodsFromCart($link, $session_id);

  $userData = [
    'name' => $name,
    'phone' => $phone,
    'addInfo' => $addInfo
  ];

  $order_id = formOrder($link, $session_id, $userData);
  if ($order_id) {
//    if(!isset($_SESSION['order_id'])){
//    }
    $arr = getOrdersId($link, $session_id);
//    echo "ARRRRRRR: ";
//    print_r($arr);
    $_SESSION['order_id'] = [];
    $_SESSION['order_id'] = array_column($arr, 'order_id');
//    echo "SESSID: ";
//    print_r($_SESSION['order_id']);
//    print_r($_SESSION);
//    echo is_array($_SESSION['order_id']) ? "arrrr" : "not arr";
//    echo "Заказ оформлен. Номер Вашего заказа: $order_id!</br><a href='orders.php'>К заказам</a>";
    header('Location: orders.php');
  } else {
    header('Location: error.php');
//    echo "Заказ не оформлен. произошла ошибка.</br>На <a href='index.php'>сайт</a>";
  }


}

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
  if($order_id){
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

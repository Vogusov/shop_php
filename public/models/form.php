<?php

// публикация отзывов:
if (isset($_POST['post_comment'])) {
  saveCommentToDb($link, null, strip_tags(trim($_POST['name'])), strip_tags(trim($_POST['text'])), date("d.F.Y H:i:s"), strip_tags(trim($_POST['email'])));
}



// авторизация пользователей:
if (isset($_POST['login'])) {
  $login = strip_tags(trim($_POST['login']));
  $pass = isset($_POST['pass']) ? md5(SALT . strip_tags(trim($_POST['pass'])) . SALT) : "";
//  echo ":$pass:";
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




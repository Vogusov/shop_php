<h1>Вход</h1>

<?php
if(isset($_GET['success'])):
?>
  <p>Поздравляем! Вы успешно зарегистрировались!<br>Теперь авторизуйтесь, используя свои Логин и пароль:</p>
<?php else: ?>
  <p><a href="/server/registration.php" style="color: blue; font-size: 1.5em; border: 1px solid blue">Зарегистрироваться</a></p>
<?php endif; ?>


<?= SID; ?>
<?= session_id(); ?>


<form action="form.php" method="post">

  <p>Введите свой логин:</p>
  <p><input type="text" name="login" value="<?= isset($_COOKIE['login']) ? $_COOKIE['login'] : ""; ?>" required/></p>
  <p>Введите свой пароль:</p>
  <p><input type="password" name="pass" value="<?= isset($_COOKIE['pass']) ? $_COOKIE['pass'] : ""; ?>" required/></p>
  <p><input id="auth" type="submit" name="auth" value="Войти"/></p>
  <?php
  if (isset($_COOKIE['login']) && isset($_COOKIE['pass'])):
    ?>
    <p><input type="submit" name="exit" value="Выйти"/></p>
  <?php endif; ?>

</form>


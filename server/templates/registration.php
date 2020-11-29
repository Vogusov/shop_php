<h1>Вход</h1>

<?php
if(isset($_GET['success']) && isset($_COOKIE['login'])):?>
<h2>Вывошли как <?= $_COOKIE['login']; ?>. РОль <?= $_COOKIE['role']; ?>.<?php print_r($_COOKIE); ?></h2>

<?php
//  elseif (isset($_GET['success']) && !isset($_GET['remember'])):
//  ?>
<!--  <h2>Нету куков</h2>-->
<?php endif; ?>

<p>
  Здравствуйте, посетитель, вы видели эту страницу <?= $_SESSION['count']; ?> раз.</br>

</p>
<?= SID; ?>
<?= session_id(); ?>



<form action="form.php" method="post">
  <p>admin</p>
  <p>Введите свой логин:</p>
  <p><input type="text" name="login" value="<?= isset($_COOKIE['login']) ? $_COOKIE['login'] : ""; ?>" required /></p>
  <p>Введите свой пароль:</p>
  <p><input type="password" name="pass" value="<?= isset($_COOKIE['pass']) ? $_COOKIE['pass'] : ""; ?>" required /></p>
<!--  <p><input type="checkbox" name="remember-me" /></p>-->
  <p><input type="submit" value="Войти" /></p>

</form>

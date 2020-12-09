<h1><?= $title ?></h1>

<p>Вы <?= $_COOKIE['name']; ?></p>
<p>Ваша почта <?= $_COOKIE['email']; ?></p>
<p>Ваш телефон <?= $_COOKIE['phone']; ?></p>

<form action="form.php" method="post">

  <?php
  if (isset($_COOKIE['login']) && isset($_COOKIE['pass'])):
    ?>
    <p><input type="submit" name="exit" value="Выйти"/></p>
  <?php endif; ?>

</form>

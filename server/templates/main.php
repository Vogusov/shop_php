<?php

//include "models/config/config.php"; /* для стилей */
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?= $title ?></title>
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="stylesheet" href="<?= STYLES_CSS; ?>">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!--  <link rel="stylesheet" href="/public/css/style.css">-->
</head>

<body>
<div class="wrapper">

  <?php

  include (string)$header;
  ?>

  <main class="main">
    <div class="container">
      <?php
      include (string)$content;
      ?>
    </div>
  </main>

  <?php
  include (string)$footer;
  ?>
</div>


<script src="/public/js/script.js"></script>

<script>
  // считаем сумму только для корзины
  if (window.location.pathname === '/server/cart.php') {
    countTotalSumInCart()
  }
</script>
</body>

</html>
<?php include "config/config.php" /* для стилей */?>
<!doctype html>
<html lang="en">
<body>
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?= $title ?></title>
  <link rel="stylesheet" href="<?= STYLES_CSS; ?>">
<!--  <link rel="stylesheet" href="/public/css/style.css">-->
</head>
<div class="wrapper">

  <?php
  //print_r(STYLES_CSS);
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



</body>

</html>

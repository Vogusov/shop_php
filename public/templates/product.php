<h1>Страница товара <?= $id; ?></h1>


<?php
  $product = getProductById($link, $id);
  if($product):?>

<div class="product">
  <img src="<?= IMAGES_PATH . $product['img_name'] ?>" class="product__img" alt="">
  <p><?= $product['name']; ?></p>
  <p><?= $product['price']; ?></p>
  <p><?= $product['description']; ?></p>
  <div class="buy_button">
    <a href="cart.php?id=<?= $product['id'] ?>">Добавить в корзину</a>
  </div>
</div>
<?php endif; ?>

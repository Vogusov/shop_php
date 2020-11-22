<h1>Страница товара <?= $id; ?></h1>


<?php
  $product = getProductById($link, $id);
  if($product):?>

<div class="product">
  <img src="<?= IMAGES_PATH . $product['img_name']; ?>" class="product__img" alt="">
  <p><?= $product['name']; ?></p>
  <p><?= $product['price']; ?> Р</p>
  <p><?= $product['description']; ?></p>
  <div class="buy_button js-add-to-cart" data-id="<?= $id; ?>" data-name="<?= $product['name'] ?>">
    <span>Добавить в корзину</span>
  </div>
</div>
<?php endif; ?>

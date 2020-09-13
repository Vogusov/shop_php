<h1>Страница товара <?= $id; ?></h1>


<?php
  $product = getProductById($link, $id);
  if($product):?>

<div class="product">
  <img src="<?= $product['img_location'] . $product['img_name'] ?>" class="product__img" alt="">
  <p><?= $product['name']; ?></p>
  <p><?= $product['price']; ?></p>
  <p><?= $product['description']; ?></p>
</div>
<?php endif; ?>

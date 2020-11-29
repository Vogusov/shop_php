<h1>Каталог товаров</h1>

<div class="goods">

  <?php
  $goods = getGoods($link);
  if ($goods) :
    foreach ($goods as $product):
      ?>

      <div id="<?= $product['id']; ?>" class="item">
        <a href="product.php?id=<?= $product['id']; ?>">
          <img src="<?= IMAGES_SM_PATH . $product['img_name']; ?>" class="item__img" alt="">
        </a>
        <p class="product_name js-product-name"><?= $product['name']; ?></p>
        <p class="product_price"><?= $product['price']; ?> Р</p>
        <button class="js-add-to-cart primary-button" data-id="<?= $product['id']; ?>" data-name="<?= $product['name'] ?>">
          <span>Добавить в корзину</span>
        </button>
      </div>

    <?php endforeach; ?>
  <?php endif; ?>


</div>
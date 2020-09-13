<h1>Каталог товаров</h1>

<div class="goods">

  <?php
  $goods = getGoods($link);
//  print_r($goods);
  if($goods){
    foreach ($goods as $product){
  ?>

    <div id="<?= $product['id'] ?>" class="item">
      <a href="product.php?id=<?= $product['id'] ?>">
        <img src="<?= $product['img_sm_location'] ?>" class="item__img" alt="">
      </a>
      <p class="product_name">
        <?= $product['name']; ?>
      </p>
      <p class="product_name">
        <?= $product['price']; ?>
      </p>
    </div>

  <?php }
  }
  ?>


</div>
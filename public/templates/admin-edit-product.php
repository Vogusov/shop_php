<h1>Редактирование товара</h1>

<div class="edit__container">

  <?php
  $product = getProductById($link, $id);
  if ($product):?>

  <div class="edit__image">
    <img src="<?= IMAGES_PATH . $product['img_name']; ?>" alt="">
  </div>

  <div class="edit__form">
    <form action="form.php" method="post">
      <input type="text" name="product-name" value="<?= $product['name']; ?>"><br>
      <input type="text" name="product-price" value="<?= $product['price']; ?>"><br>
      <textarea cols="20" rows="5" name="product-description"><?= $product['description']; ?></textarea><br>
      <input type="submit" name="edit" value="Сохранить">
    </form>
  </div>

  <?php endif; ?>
</div>




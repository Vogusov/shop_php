<h1>Редактирование товара</h1>

<div class="edit__container">

  <?php
  $product = getProductById($link, $id);
  if ($product):?>

    <div class="edit__image">
      <img src="<?= IMAGES_PATH . $product['img_name']; ?>" alt="">
    </div>

    <div class="edit__form">
      <form action="admin-edit-product.php" method="post" enctype="multipart/form-data">
        <input type="text" name="product-name" value="<?= $product['name']; ?>"><br>
        <input type="text" name="product-price" value="<?= $product['price']; ?>"><br>
        <textarea cols="20" rows="5" name="product-description"><?= $product['description']; ?></textarea><br>
        <input type="hidden" name="MAX_FILE_SIZE" value="30000"/>
        <p>Загрузите картинку 300x300px:</p>
        <input type="file" name="product-image" accept="image/jpeg,image/png,image/gif">
        <input type="hidden" name="product-id" value="<?= $product['id']; ?>">
        <input type="hidden"  name="product-img-name" value="<?= $product['img_name']; ?>">
        <input type="submit" name="edit-product" value="Сохранить">
      </form>
    </div>

  <?php endif; ?>
</div>




<h1>Админка</h1>


<table class="admin-table" style='text-align:center;' border='1' width='100%'>
  <tr>
    <td><p>id</p></td>
    <td><p>Изображение</p></td>
    <td>Наименование</td>
    <td>Цена</td>
    <td><p>Описание</p></td>
    <td>Название изображения</td>
  </tr>

  <?php
  $goods = getGoods($link);
  //print_r($goods);
  if ($goods) :?>
    <?php foreach ($goods as $product):?>

      <tr>

        <td><?= $product['id']; ?></td>
        <td><img src="<?= IMAGES_SM_PATH . $product['img_name']; ?>" class="admin-table__img" alt=""></td>
        <td><?= $product['name']; ?></td>
        <td><?= $product['price']; ?></td>
        <td><?= $product['description']; ?></td>
        <td><?= $product['img_name']; ?></td>
        <td><a href="admin-edit-product.php?action=edit&id=<?=$product['id'] ?>">Редактировать</a></td>
        <td><a href="admin-edit-product.php?action=delete&id=<?=$product['id'] ?>">Удалить</a></td>
      </tr>


    <?php endforeach; ?>
  <?php endif; ?>
</table>
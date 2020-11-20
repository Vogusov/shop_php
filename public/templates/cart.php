<h1>Корзина</h1>

<table class="cart-table">
  <tr>
    <th><p>Изображение</p></th>
    <th><p>Наименование</p></th>
    <th><p>Цена</p></th>
    <th><p>Колличество</p></th>
    <th><p>Стоимость</p></th>
    <th></th>
  </tr>

  <?php
  $goods = getGoodsFromCart($link, $session_id);
  if ($goods):
    foreach ($goods as $product):
      ?>
      <tr data-id="<?= $product['product_id'] ?>">
        <td><img src="<?= IMAGES_SM_PATH . $product['img']; ?>" class="cart-table__img" alt=""></td>
        <td><p><?= $product['name'] ?></p></td>
        <td><p class="cart__price"><?= $product['price'] ?></p></td>
        <td>
          <p>
            <input type="button" class="change-quantity" value="-">
            <span class="cart__quantity"><?= $product['quantity'] ?></span>
            <input type="button" class="change-quantity" value="+">
          </p>
        </td>
        <td><p class="cart__total"><?= $product['total'] ?></p></td>
        <td><p class="cart__delete">X</p></td>
      </tr>
    <?php endforeach; ?>
  <?php endif; ?>
</table>
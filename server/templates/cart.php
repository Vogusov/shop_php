<h1>Корзина</h1>

<div id="cart-wrapper" class="cart__wrapper">
  <?php
  $goods = getGoodsFromCart($link, $session_id);
  // Если есть товары, то рендерим их
  if ($goods):
    ?>

    <table id="cart-table" class="cart-table js-cart-table">

      <thead>
      <tr>
        <th><p>Изображение</p></th>
        <th><p>Наименование</p></th>
        <th><p>Цена</p></th>
        <th><p>Колличество</p></th>
        <th><p>Стоимость</p></th>
        <th></th>
      </tr>
      </thead>

      <tbody>
      <?php
      foreach ($goods as $product):
        ?>
        <tr data-id="<?= $product['product_id']; ?>">
          <td><img src="<?= IMAGES_SM_PATH . $product['img']; ?>" class="cart-table__img" alt=""></td>
          <td><p><?= $product['name'] ?></p></td>
          <td><p><span class="js-cart-price"><?= $product['price']; ?></span> Р</p></td>
          <td>
            <p>
              <input type="button" class="js-change-quantity change-quantity" value="-">
              <span class="js-cart-quantity"><?= $product['quantity']; ?></span>
              <input type="button" class="js-change-quantity change-quantity" value="+">
            </p>
          </td>
          <td><p><span class="js-cart-total"><?= $product['total']; ?></span> Р</p></td>
          <td><p class="cart__delete js-cart-delete" data-name="<?= $product['name'] ?>" title="delete from cart">X</p></td>
        </tr>
      <?php endforeach; ?>
      </tbody>

      <tfoot>
      <tr>
        <td colspan="4" class="cart-table__total-row">
          ИТОГО:
        </td>
        <td><span class="js-cart-total-price"></span> Р</td>
      </tr>
      </tfoot>

    </table>
  
  

    <a href="form-order.php" class="primary-button primary-button_size_l">
      <span>Оформить заказ</span>
    </a>


  <?php
  // Если в корзине нет товаров, то выводим сообщение
  else:
    ?>
    <p>Ваша корзина пуста. Вернитесь в <a href="/server/catalog.php" style="text-decoration: underline">магазин</a> , чтобы ее пополнить.</p>
  <?php
  endif;
  ?>
</div>


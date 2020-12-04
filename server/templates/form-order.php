<h1><?= $title ?></h1>

<p>Номер сессии: <?= session_id(); ?></p>

<div>
  <h2>Ваши товары: </h2>

  <table class="products-to-order">
    <?php
      $goods = getGoodsFromCart($link, session_id());
      foreach ($goods as $product):
    ?>
        <tr data-id="<?= $product['product_id']; ?>">
          <td><img src="<?= IMAGES_SM_PATH . $product['img']; ?>" class="cart-table__img" alt=""></td>
          <td><p><?= $product['name'] ?></p></td>
          <td><p><?= $product['price']; ?> Р</p></td>
          <td>
            <p><?= $product['quantity']; ?> шт.</p>
          </td>
          <td><p><?= $product['total']; ?> Р</p></td>
        </tr>


    <?php endforeach; ?>

  </table>
  <p>Вернуться к  <a href="cart.php" style="text-decoration: underline"><b>корзине</b></a></p>
</div>



<h2>Заполните форму: </h2>

<form action="form.php" method="post">
  <fieldset>
    <legend>Введите свою контактную информацию, чтобы мы могли с Вами связаться</legend>
    <p>
      <label for="name">Ваше имя:</label>
      <input type="text" id="name" name="name" required>
    </p>
    <p>
      <label for="phone">Ваш номер телефона:</label>
      <input type="tel" id="phone" name="phone" required>
    </p>
    <p>
      <label for="add-info">Напишите дополнительную информацию и ваши пожелания, если считаете нужным:</label>
      <textarea name="add-info" id="add-info" cols="30" rows="10"></textarea>
    </p>
  </fieldset>
  <button type="submit" name="form-order" class="primary-button primary-button_size_l">Оформить заказ</button>
</form>
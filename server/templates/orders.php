<h1><?= $title ?></h1>

<?php
$orders = $_SESSION['order_id'];
for ($i = 0, $length = count($orders); $i < $length; $i++):
//print_r($orders[$i]);
  $sum = countOrderSum($link, $orders[$i]);
  ?>

  <div class="my-order">
    <h3>Заказ № <?= $orders[$i]; ?></h3>

    <table class="table-orders">
      <?php
      $goods = getGoodsFromOrders($link, $orders[$i]);
      //    print_r($goods);
      foreach ($goods as $product):
        ?>

        <tr data-id="<?= $product['product_id']; ?>">
          <td><img src="<?= IMAGES_SM_PATH . $product['img']; ?>" class="cart-table__img" alt=""></td>
          <td><p><?= $product['product_name'] ?></p></td>
          <th>цена: </th><td><p><?= $product['price']; ?> Р</p></td>
          <th>коллическтво: </th><td>

            <p><?= $product['quantity']; ?> шт.</p>
          </td>
          <th>сумма: </th><td><p><?= $product['sum']; ?> Р</p></td>
        </tr>

      <?php endforeach; ?>
    </table>
    <p>Заказ составлен <?= $product['date']; ?></p>
    <p>Ваш комментарий к заказу: <?= $product['info']; ?></p>
    <p>Итоговая сумма заказа: <?= $sum['order_sum']; ?> р.</p>
  </div>

<?php endfor; ?>


<p>Вернуться к <a href="catalog.php" style="text-decoration: underline"><b>каталогу</b></a></p>

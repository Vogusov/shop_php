<h1><?= $title ?></h1>

<?php
echo session_id() . '<br>';
print_r($_SESSION['order_id']);
?>

<h2>Ваши заказы: </h2>

<?php
$orders = $_SESSION['order_id'];
for($i = 0, $length = count($orders); $i < $length; $i++):
print_r($orders[$i]);
?>

<h3>Заказ № <?= $orders[$i]['order_id']; ?></h3>

<?php
$goods = getGoodsFromOrders($link, $orders[$i]['order_id']);
foreach ($goods as $product):
  ?>
  <table>
    <tr data-id="<?= $product['product_id']; ?>">
      <td><img src="<?= IMAGES_SM_PATH . $product['img']; ?>" class="cart-table__img" alt=""></td>
      <td><p><?= $product['name'] ?></p></td>
      <td><p><?= $product['price']; ?> Р</p></td>
      <td>
        <p><?= $product['quantity']; ?> шт.</p>
      </td>
      <td><p><?= $product['sum']; ?> Р</p></td>
    </tr>
</table>
<?php endforeach; ?>
  <p>Заказ составлен <?= $product['date']; ?></p>
  <p>Ваш комментарий к заказу: <?= $product['info']; ?></p>
  <p>Итоговая сумма заказа:  р.</p>
<?php endfor; ?>



<p>Вернуться к  <a href="catalog.php" style="text-decoration: underline"><b>каталогу</b></a></p>

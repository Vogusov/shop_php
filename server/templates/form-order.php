<h1><?= $title ?></h1>

<p>Номер сессии: <?= session_id() ?></p>

<div>
  <h2>Ваши товары: </h2>
  <p>тут должен быть список товаров</p>
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
  <button type="submit" value="form-order" class="primary-button primary-button_size_l">Оформить заказ</button>
</form>
<header class="header">
  <div class="container">
    <div class="header__content">
      <div class="header__block header__block1">
        <a href="#" class="logo">
          ArtJewelry
        </a>
      </div>
      <div class="header__block header__block2">
        <img src="/public/assets/svg/location.svg" alt="">
        <span>Санкт-Петербург, Красногвардейский р-н</span>
      </div>
      <div class="header__block header__block3">
        <img src="/public/assets/svg/phone.svg" alt="">
        <div>
          <span>8 999 888 77 66</span><br>
          <span>с 9:00 до 22:00</span>
        </div>
      </div>

      <div class="header__block header__reg">
        <?php if (!isset($_COOKIE['login'])): ?>
          <p><a href="/server/authorization.php">Войти / Зарегистрироваться</a></p>
        <?php endif; ?>

        <?php if (isset($_COOKIE['login'])): ?>
          <p><a href="/server/account.php">Личный кабинет</a></p>
        <?php endif; ?>

        <?php
        if (!empty($_SESSION['order_id'])):
          ?>
          <p><a href="/server/orders.php">Мои заказы</a></p>
        <?php endif; ?>
        <p>Номер сессии: <?= session_id(); ?></p>
        <!--        <p>Имя: --><? //= $_SESSION['customer_name']; ?><!--</p>-->
        <!--        <p>Телефон: --><? //= $_SESSION['customer_phone']; ?><!--</p>-->
        <?php foreach ($_SESSION as $key => $value): ?>
          <p><?= "$key: $value"; ?></p>
        <?php endforeach; ?>
      </div>
    </div>

    <nav class="nav main__nav">
      <ul>
        <li><a href="index.php">Главная</a></li>
        <li><a href="catalog.php">Каталог</a></li>
        <li><a href="comments.php">Отзывы</a></li>
        <li><a href="contacts.php">Контакты</a></li>
        <li><a href="cart.php">Корзина</a></li>
        <?php
        if (isset($_COOKIE['role']) && (int)$_COOKIE['role'] === 1):
          ?>
          <li><a href="admin.php">Админка</a></li>
        <?php endif; ?>
      </ul>
    </nav>

  </div>
</header>

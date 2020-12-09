<h1>Отзывы</h1>



  <?php
  if (isset($_COOKIE['login']) && isset($_COOKIE['pass'])):
  ?>
<div class="new-comment-form">
  <h3>Здесь можно написать отзыв о нашем магазине:</h3>
<!--  <h2 style="color:green;">--><?//= $success ?><!--</h2>-->

  <div class="form-container">
    <form action="form.php" method="POST">
        <input id="name" type="hidden" name="name" value="<?= $_COOKIE['name']; ?>" >
        <input id="email" type="hidden" name="email" value="<?= $_COOKIE['email'];?>" >
        <label for="text">Оставьте отзыв: </label>
        <textarea id="text" rows="5" cols="50" name="comment" required></textarea>
      <input type="submit" name="post_comment" value="Опубликовать!">

    </form>
  </div>
</div>
  <?php else: ?>
  <p>Только зарегистрированные ползователи могут оставлять отзывы.<br><a href="/server/authorization.php" style="text-decoration: underline; cursor: pointer">Зарегистрируйтесь или авторизуйтесь</a>, чтобы оставить отзыв.</p>
<?php
endif;
?>

<hr>

<?php
if(isset($_GET['posted'])):
?>
<p>Ваш отзыв успешно опубликован!</p>
<?php endif; ?>

<div class="comments">

  <?php
  $comments = getAllComments($link);
  if (!$comments):?>
    <p>Комментариев нет. Оставьте первый отзыв.</p>
  <?php elseif ($comments):
    foreach ($comments as $comment):?>

      <div class="comment">
        <p>Имя: <?= $comment['name']; ?></p>
        <p>Отзыв: <?= $comment['comment']; ?></p>
        <p>Дата: <?= $comment['date_time']; ?></p>
        <p>email: <?= $comment['email']; ?></p>
      </div>

    <?php endforeach; ?>
  <?php endif; ?>

</div>

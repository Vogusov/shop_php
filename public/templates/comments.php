<h1>Отзывы</h1>


<div class="new-comment-form">
  <h3>Здесь можно написать комментарий:</h3>
<!--  <h2 style="color:green;">--><?//= $success ?><!--</h2>-->

  <div class="form-container">
    <form action="form.php" method="POST">
      <fieldset>
        <label for="name">Введите имя:</label>
        <input id="name" type="text" name="name" required>
      </fieldset>
      <fieldset>
        <label for="email">Ваш номер телефона:</label>
        <input id="email" type="email" name="email" required>
      </fieldset>
      <fieldset>
        <label for="text">Напишите комментарий:</label>
        <textarea id="text" rows="5" cols="50" name="text" required></textarea>
      </fieldset>
      <input type="submit" name="post_comment" value="Опубликовать!">

    </form>
  </div>
</div>

<hr>

<div class="comments">

  <?php
  $comments = getAllComments($link);
  if (!$comments):?>
    <p>Комментариев нет. Оставьте первый отзыв.</p>
  <?php elseif ($comments):
    foreach ($comments as $comment):?>

      <div class="comment">
        <p>Имя: <?= $comment['user_name']; ?></p>
        <p>Отзыв: <?= $comment['comment']; ?></p>
        <p>Дата: <?= $comment['date']; ?></p>
        <p>email: <?= $comment['email']; ?></p>
      </div>

    <?php endforeach; ?>
  <?php endif; ?>

</div>

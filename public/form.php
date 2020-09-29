<?php
include "models/model.php";
include "config/config-db.php";


// обработка запросов:

// публикация отзывов:
if (isset($_POST['post_comment'])) {
  saveCommentToDb($link, null, strip_tags(trim($_POST['name'])), strip_tags(trim($_POST['text'])), date("d.F.Y H:i:s"), strip_tags(trim($_POST['email'])));
}






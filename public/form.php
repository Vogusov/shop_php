<?php
include "models/model.php";
include "config/config-db.php";
print_r($_POST);
saveCommentToDb($link, $_POST['name'], $_POST['text'], date("d.M.Y"), $_POST['phone']);
<?php
include "models/model.php";
include "config/config-db.php";

if (isset($_POST['post_comment'])) {
  saveCommentToDb($link, null, strip_tags(trim($_POST['name'])), strip_tags(trim($_POST['text'])),  date("d.M.Y"), strip_tags(trim($_POST['phone'])));
} else {
  echo "что-то не так!";
}

//if (isset($GET['action']){
//  $action = $GET['action'];
//  if ($action == 'edit'){
//
//  }
//}

<?php
$title = 'Регистрация';
$content = 'templates/registration.php';

$header = 'templates/header.php';
$footer = 'templates/footer.php';

session_start();

if (empty($_SESSION['count'])) {
  $_SESSION['count'] = 1;
} else {
  $_SESSION['count']++;
}

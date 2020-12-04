<?php

require "config.php";

/* Указать mysqli выбрасывать исключение в случае возникновения ошибки */
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

/* Соединение с БД */
$link = mysqli_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB)
or die("Ошибка соединения!" . mysqli_error($link));

if (!mysqli_set_charset($link, "utf8")) {
  printf("Error: " . mysqli_error($link));
}


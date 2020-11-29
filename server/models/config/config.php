<?php
/* database */
define('MYSQL_SERVER', 'localhost');
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_DB', 'shop');



/* paths */
// не работает такой путь:
//define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/public/');
//define('STYLES_CSS', $_SERVER['DOCUMENT_ROOT'].'css/style.css');
//define('IMAGES_PATH', $_SERVER['DOCUMENT_ROOT'].'images/catalog/');
//define('IMAGES_SM_PATH', $_SERVER['DOCUMENT_ROOT'].'images/catalog_sm/');
//можно посмотреть в templates/main.php на примере подключения стилей

define('ROOT_PATH', '/');
define('STYLES_CSS', '../public/css/style.css');
define('IMAGES_PATH', '../public/images/catalog/');
define('IMAGES_SM_PATH', '../public/images/catalog_sm/');


// размер маленькой картинки товара для каталога.
define('IMG_SM_SIZE', 50);

// salt
define('SALT', 'db52!d04dc%20');

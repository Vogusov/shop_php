<?php
/* database */
define('MYSQL_SERVER', 'localhost');
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_DB', 'shop');



/* paths */

// не работает такой путь:
//define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/public/');
//можно посмотреть в templates/main.php на примере подключения стилей

define('ROOT_PATH', '/public/');
define('STYLES_CSS', ROOT_PATH . 'css/style.css');
define('IMAGES_PATH', ROOT_PATH . 'images/catalog/');
define('IMAGES_SM_PATH', ROOT_PATH . 'images/catalog_sm/');


// размер маленькой картинки товара для каталога.
define('IMG_SM_SIZE', 50);
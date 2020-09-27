<?php
/* database */
define('MYSQL_SERVER', 'localhost');
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', 'root');
define('MYSQL_DB', 'shop');



/* paths */

// не работает такой путь:
//define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT'].'/public/');

define('ROOT_PATH', '/public/');
define('STYLES_CSS', ROOT_PATH . 'css/style.css');
define('IMAGES_PATH', ROOT_PATH . 'images/catalog/');
define('IMAGES_SM_PATH', ROOT_PATH . 'images/catalog_sm/');
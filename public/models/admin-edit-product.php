<?php

$title = 'Админка. Редактирование товара';
$header = 'templates/header.php';
$footer = 'templates/footer.php';


// редактирование или удаление товара из админки:
if (isset ($_GET['action'])) {
  $action = $_GET['action'];

  if (isset ($_GET['id']))
    $id = $_GET['id'];

  // если редактирование, то переадресация на страницу редактирования.
  if ($action == 'edit') {
    $content = 'templates/admin-edit-product.php';
  } elseif ($action == 'delete') {

    // если удаление -> запрос к БД на удаление:
    $content = 'templates/admin.php';
    $product = getProductById($link, $id);
    echo deleteGoodsFromDB($link, $id) . "товар id=$id, {$product['name']} удален из БД";
  } elseif ($action == 'add') {
    $content = 'templates/admin-add-product.php';
  }


} // со страницы редактирования товара запрос на изменение:
elseif (isset ($_POST['edit-product'])) {

  //img:
  //todo: проверять нет ли такого же имени файла в БД!!
  if (isset($_FILES['product-image'])) {
    print_r($_FILES['product-image']);

    $img_file_name = translit($_FILES['product-image']['name']);
    $path = IMAGES_PATH . $img_file_name;
    $path_sm = IMAGES_SM_PATH . $img_file_name;
    $file_size = $_FILES['product-image']['size'];

    print_r($path);
    var_dump($_FILES['product-image']['tmp_name']);
    var_dump(translit($_FILES['product-image']['name']));

    if ($_FILES['product-image']['error']) {
      echo 'Ошибка загрузки файла';
    } elseif ($_FILES['product-image']['size'] > 1000000) {
      echo "Файл слишком большой. Заргружаемый файл должен быть не больше 1Мб <br> <a href=\"index.php\">К галерее</a>";
    } elseif (strlen($img_file_name) > 30) {
      echo "Имя файла слишком длинное. Переименуйте файл перед загрузкой. Имя файла должно быть короче 26 символов.";
    } elseif (
      $_FILES['product-image']['type'] == 'image/jpeg' ||
      $_FILES['product-image']['type'] == 'image/png' ||
      $_FILES['product-image']['type'] == 'image/gif'
    ) {
      // копируем картинку в нашу папку, уменьшаем и копируем в папку с маленькими
      if (copy($_FILES['product-image']['tmp_name'], $path)) {
        resize($path, $path_sm, IMG_SM_SIZE);
        echo "Файл загружен! <br>";
      } else {
        echo "Обшибка при загрузке файла";
      }
    }
  }

  // форма описания товара
  if (isset ($_POST['product-id'])) {
    $id = (int)trim(strip_tags($_POST['product-id']));
    $productName = (string)trim(strip_tags($_POST['product-name']));
    $productPrice = (int)trim(strip_tags($_POST['product-price']));
    $productDescription = (string)trim(strip_tags($_POST['product-description']));
    if (!isset($img_file_name)) {
      $productImgName = (string)trim(strip_tags($_POST['product-img-name']));
    } else {
      $productImgName = $img_file_name;
    }
    $content = 'templates/admin.php';
    $product = getProductById($link, $id);

    echo 'Successfully edited' . editProductInDB($link, $id, $productName, $productPrice, $productDescription, $productImgName) . ' product';
  }
// todo: сделать редактирование товара с загрузкой фото!!!

}


// Добавлени нового товара в БД

elseif (isset ($_POST['add-product'])) {
  $productName = (string)trim(strip_tags($_POST['product-name']));
  $productPrice = (int)trim(strip_tags($_POST['product-price']));
  $productDescription = (string)trim(strip_tags($_POST['product-description']));

  if (isset($_FILES['product-image'])) {
    // todo: удалить эти выводы
    echo 'Product image is: ';
    print_r($_FILES['product-image']);

    $img_file_name = translit($_FILES['product-image']['name']);
    $path = IMAGES_PATH . $img_file_name;
    $path_sm = IMAGES_SM_PATH . $img_file_name;
//    $file_size = $_FILES['product-image']['size'];

    print_r($path);
    var_dump($_FILES['product-image']['tmp_name']);
    var_dump(translit($_FILES['product-image']['name']));

    // если нет картинки, то делаем запрос к бд без нее.
    if ($_FILES['product-image']['error']) {
      $prodImgErr = $_FILES['product-image']['error'];
      echo "Файл не был загружен. Ошибка: $prodImgErr";
      if ($_FILES['product-image']['error'] === 4)
        echo 'Successfully edited' . addNewProductToDB($link, $productName, $productPrice, $productDescription, null) . ' product';
      $content = 'templates/admin.php';

    } elseif ($_FILES['product-image']['size'] > 1000000) {
      echo "Файл слишком большой. Заргружаемый файл должен быть не больше 1Мб <br> <a href=\"index.php\">К галерее</a>";
    } elseif (strlen($img_file_name) > 30) {
      echo "Имя файла слишком длинное. Переименуйте файл перед загрузкой. Имя файла должно быть короче 30 символов.";
    } elseif (
      $_FILES['product-image']['type'] == 'image/jpeg' ||
      $_FILES['product-image']['type'] == 'image/png' ||
      $_FILES['product-image']['type'] == 'image/gif'
    ) {
      // копируем картинку в нашу папку, уменьшаем и копируем в папку с маленькими
      if (copy($_FILES['product-image']['tmp_name'], $path)) {
        resize($path, $path_sm, IMG_SM_SIZE);
        echo "Файл загружен! <br>";

        $productImgName = $img_file_name;
        $content = 'templates/admin.php';

        echo 'Successfully edited' . addNewProductToDB($link, $productName, $productPrice, $productDescription, $productImgName) . ' product';
      } else {
        echo "Обшибка при загрузке файла";
      }
    }


  }

//  echo addNewProductToDB($link, $id, $productName, $productPrice, $productDescription, $productImgName);
  }


 else {
  echo 'что-то не так с изменением товара!';
}
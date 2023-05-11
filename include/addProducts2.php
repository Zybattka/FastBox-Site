<?php

if ($_POST) {
    session_start();

    $connect = mysqli_connect('localhost', 'root', 'admin', 'FastBox_bd');

    if (!$connect) {
        echo 'Отсутствует подключение к базе данных';
    }

    $name_products = $_POST['name_products'];
    $img_products = $_POST['img_products'];
    $descr_products = $_POST['descr_products'];
    $data_products = $_POST['data_products'];
    $numbers_products = $_POST['numbers_products'];
    $batch_number = $_POST['batch_number'];
    $from_what_city = $_POST['from_what_city'];
    $provider = $_POST['provider'];
    $compound = $_POST['compound'];
    $best_before_date = $_POST['best_before_date'];

    $path = 'uploads/products-img/' . time() . $_FILES['img_products']['name'];
    move_uploaded_file($_FILES['img_products']['tmp_name'], '../' . $path);

    mysqli_query($connect, "INSERT INTO `products2` (`id`, `name_products`, `img_products`, `descr_products`, `data_products`, `numbers_products`, `batch_number`, `from_what_city`, `provider`, `compound`, `best_before_date`) VALUES (NULL, '$name_products', '$path',
    '$descr_products', '$data_products', '$numbers_products', '$batch_number', '$from_what_city', '$provider', '$compound', '$best_before_date')");

    header('Location: ../profile.php');
}
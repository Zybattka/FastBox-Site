<?php

require_once '../include/connect.php';

$id = $_POST['id'];
$name_products = $_POST['name_products'];
$descr_products = $_POST['descr_products'];
$data_products = $_POST['data_products'];
$numbers_products = $_POST['numbers_products'];
$batch_number = $_POST['batch_number'];
$from_what_city = $_POST['from_what_city'];
$provider = $_POST['provider'];
$compound = $_POST['compound'];
$best_before_date = $_POST['best_before_date'];

mysqli_query($connect, "UPDATE `products2` SET `name_products` = '$name_products', `descr_products` = '$descr_products', `data_products` = '$data_products', `numbers_products` = '$numbers_products', `batch_number` = '$batch_number', `from_what_city` = '$from_what_city', `provider` = '$provider', `compound` = '$compound', `best_before_date` = '$best_before_date' WHERE `products2`. `id` = '$id'");

// После выполнение запроса на обновление информации нас автоматически перекидывает на склад с товарами.
header('Location: ../packageTwo.php');
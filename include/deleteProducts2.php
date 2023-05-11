<?php

require_once '../include/connect.php';

$id = $_GET['id'];

mysqli_query($connect, "DELETE FROM `products2` WHERE `products2`.`id` = '$id'");

header('Location: ../packageTwo.php');
<?php

require_once '../include/connect.php';

$id = $_GET['id'];

mysqli_query($connect, "DELETE FROM `users` WHERE `users`.`id` = '$id'");

header('Location: ../profile.php');
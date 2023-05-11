<!-- Back-end часть авторизации -->
<!-- Этот файл будет отвечать за авторизацию на сайте -->

<?php

    session_start();
    // Подключаемся к файлу для подключения к базе данных.
    // require_once 'connect.php';
    $connect = mysqli_connect('localhost', 'root', 'admin', 'FastBox_bd');

    
    $login = $_POST['login'];
    $password = md5($_POST['password']);

    // Делаем запрос в базу данных, где сравниваем введённый пароль и логин на сайте и в базе данных.
    $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
    echo mysqli_num_rows($check_user);

    // Если "mysqli_num_rows()" вернул нам больше нуля это означает, что мы авторизировались.
    // Иначе выведем сообщение о неверном логине или пароле.
    if (mysqli_num_rows($check_user) > 0) {
        
        // Делаем запрос, чтобы вытащить всю инфу о пользователе из базы данных.
        $user = mysqli_fetch_assoc($check_user);

        // Достаем из запроса, который находится чуть выше выборочную инфу (id, login, password).
        $_SESSION['user'] = [
            "id" => $user['id'],
            "login" => $user['login'],
            "full_name" => $user['full_name'],
            "avatar" => $user['avatar'],
            "email" => $user['email'],
            "status" => $user['status']
        ];

        header('Location: ../profile.php');
    } else {
        $_SESSION['errorSigninAuthr'] = 'Неверный логин или пароль';
        header('Location: ../authorization.php');
    }
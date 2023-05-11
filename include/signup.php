<!-- Back-end часть регистрации -->
<!-- Этот файл будет отвечать за регистрацию пользователей -->
<?php


session_start();
// Подключаемся к файлу
require_once 'connect.php';

$full_name = $_POST['full_name'];
$login = $_POST['login'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

// Сравниваем пароли и если они совпадают, то продолжаем
// Иначе показывает ошибку о несовпадении пароля
if ($password === $password_confirm) {
    $path = 'uploads/' . time() . $_FILES['avatar']['name'];
    move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $path);
    
    if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $path)) {
        $_SESSION['message'] = 'Ошибка при загрузке изображения';
        header('Location: ../register.php');
    }

    // md5 и префикс к нему нужен для того, чтобы захешировать пароль, чтобы никто и никогда не узнал пароль от аккаунта.
    $password = md5($password);

    // С помощью этой команды мы будем передавать инфу в базу данных
    mysqli_query($connect, "INSERT INTO `users` (`id`, `full_name`, `login`, `email`, `password`, `avatar`) VALUES (NULL, '$full_name', '$login', '$email', '$password', '$path')");

    $_SESSION['messageRegSuccess'] = 'Регистрация прошла успешно!';
    header('Location: ../authorization.php');

} else {
    $_SESSION['msgErrorPassword'] = 'Пароли не совпадают!';
    // При несовпадении паролей перенаправляет на страницу регистрации с надписью "пароли не совпадают"
    header('Location: ../registration.php');
}
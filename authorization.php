<?php
    session_start();

    // Если переменная "user" существует, то мы делаем переадресацию на профиль пользователя.
    // Это делается для того, чтобы когда пользователь авторизировался, у него не могло появиться ещё раз страница с авторизации.
    // А то как то не логично получится :)
    if ($_SESSION['user']) {
        header('Location: profile.php');
    }
?>

<!DOCTYPE html>

<html lang="ru">

<head>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>

    <link rel="icon" type="image/svg" href="assets/images/logo.svg">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <header class="header-top">
        <div class="container">
            <div class="header-top__content">

                <a class="logo" href="index.php">

                    <img class="logo__img" src="assets/images/logo.svg" alt="logo" width="50" height="50">
                    <b class="logo__title">FastBox</b>
                </a>

                <menu class="menu">
                    <ul class="menu__list">
                        <li class="list__item">

                            <a class="item__link" href="index.php">
                                ГЛАВНАЯ
                            </a>
                        </li>
                        <li class="list__item">

                            <a class="item__link" href="aboutUs.php">
                                ИНФОРМАЦИЯ
                            </a>
                        </li>
                        <li class="list__item list__item-package">

                            <a class="item-package__link" href="package.php">
                                ПРОВЕРИТЬ ПОСЫЛКУ
                            </a>
                        </li>
                    </ul>
                </menu>
            </div>
        </div>
    </header>
    <section class="authorization-content">

        <div class="container">
            <form class="authorization-content__form" action="include/signin.php" method="post">

                <div class="form__logo-authr">

                    <img class="logo-authr" src="assets/images/logo.svg" alt="logo" width="50" height="50">

                    <b class="logo-authr__title">FastBox</b>
                </div>
                <b class="form__authorization-title">Вход</b>
                <label class="authorization-form__label authorization-form__label-1" for="">Логин:</label>
                <input class="authorization-form__input authorization-form__input-1" name="login" type="text" placeholder="Введите свой логин">
                <label class="authorization-form__label authorization-form__label-2" for="">Пароль:</label>
                <input class="authorization-form__input authorization-form__input-2" name="password" type="password" placeholder="Введите свой пароль">

                <button class="authorization-form__btn">Войти</button>

                <p class="authorization-form__text">У вас нет аккаунта? <a class="authorization-form__text-link" href="registration.php">Зарегистрируйтесь!</a></p>
                <?php
                    if ($_SESSION['messageRegSuccess']) {
                        echo '<b class="msg-reg-success">' . $_SESSION['messageRegSuccess'] . '</b>';
                    }
                    // unset() - нужно для того, чтобы вывести сообщение и "уничтожили" это сообщение, когда перезагружали страницу.
                    unset($_SESSION['messageRegSuccess']);
                ?>
            </form>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <div class="footer__content">
                <a class="logo footer-logo" href="index.php">

                    <img class="logo__img" src="assets/images/logo.svg" alt="" width="50" height="50">

                    <b class="logo__title">FastBox</b>
                </a>
                <div class="content__info">

                    <b class="info__address-title">Наш основной офис:</b>

                    <p class="info__address-text"> г. Самара, Ново-вокзальная 9,корпус- 1</p>

                    <div class="info__social-container">

                        <b class="social-container__social-text">Наши соц. сети:</b>

                        <div class="social-container__link-list">

                            <a class="info__vk" href="https://vk.com/login">

                                <img src="assets/images/vk-icon.svg" alt="vk-icon" width="45" height="45">

                            </a>

                            <a class="info__instagram" href="https://www.instagram.com/">

                                <img src="assets/images/instagram-icon.svg" alt="instagram-icon" width="50" height="50">
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
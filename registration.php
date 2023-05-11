<?php
    session_start();

    // Если переменная "user" существует, то мы делаем переадресацию на профиль пользователя.

    // Это делается для того, чтобы когда пользователь зарегистрировался, у него не могло появиться ещё раз страница с регистрацией.

    // А то как то не логично получится

    if ($_SESSION['user']) {

        header('Location: authorization.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
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
                                На главную
                            </a>
                        </li>
                        <li class="list__item">
                            <a class="item__link" href="aboutUs.php">
                                О нас
                            </a>
                        </li>
                        <li class="list__item list__item-package">
                            <a class="item-package__link" href="package.php">
                                Посмотреть посылку
                            </a>
                        </li>
                    </ul>
                </menu>
            </div>
        </div>
    </header>
    <section class="registration-content">
        <div class="container">
            <!-- в методе "action" мы связываем форму с файлом регистрации. -->
            <!-- method="post" нужен для того, чтобы в адресной строке не отображалось всё то, что мы ввели в форме. -->
            <!-- В input прописываем уникальное имя для того, чтобы делать выборку. -->
            <!-- enctype="multipart/form-data" нужен для того, чтобы передавать файлы, в нашем случае это будет картинка. -->
            <form class="registration-content__form" action="include/signup.php" method="post" enctype="multipart/form-data">
                <div class="form__logo-reg">
                    <img class="logo-reg" src="assets/images/logo.svg" alt="logo" width="50" height="50">
                    <b class="logo-reg__title">FastBox</b>
                </div>

                <b class="form__registration-title">Регистрация</b>
                <label class="registration-form__label registration-form__label-1" for="">ФИО:</label>
                <input class="registration-form__input registration-form__input-1" name="full_name" type="text" placeholder="Введите своё полное имя...">
                <label class="registration-form__label registration-form__label-2" for="">Логин:</label>

                <input class="registration-form__input registration-form__input-2" name="login" type="text" placeholder="Введите логин...">
                <label class="registration-form__label registration-form__label-3" for="">Почта:</label>

                <input class="registration-form__input registration-form__input-3" name="email" type="text" placeholder="Введите свою почту...">
                <label class="registration-form__label registration-form__label-4" for="">Аватарка:</label>

                <input class="registration-form__input registration-form__input-4" name="avatar" type="file">
                <label class="registration-form__label registration-form__label-5" for="">Пароль:</label>

                <input class="registration-form__input registration-form__input-5" name="password" type="password" placeholder="Введите пароль...">
                <label class="registration-form__label registration-form__label-6" for="">Подтвердите пароль:</label>

                <input class="registration-form__input registration-form__input-6" name="password_confirm" type="password" placeholder="Подтвердите пароль...">
                <!-- С помощью 'type="submit"' при клике на кнопку вся инфа отправляется в базу данных -->
                <button type="submit" class="authorization-form__btn">Зарегистрироваться</button>

                <p class="authorization-form__text">У вас есть аккаунт? <a class="authorization-form__text-link" href="authorization.php">Авторизируйтесь!</a></p>
                <?php
                    if ($_SESSION['msgErrorPassword']) {
                        echo '<b class="msg-error-password">' . $_SESSION['msgErrorPassword'] . '</b>';
                    }
                    // unset() - нужно для того, чтобы вывести сообщение и "уничтожили" это сообщение, когда перезагружали страницу.
                    unset($_SESSION['msgErrorPassword']);
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

                    <b class="info__address-title">Наш главный офис:</b>

                    <p class="info__address-text">- г. Самара, Московское шоссе, 4Ас1</p>

                    <div class="info__social-container">


                        <b class="social-container__social-text">Наши соц. сети:</b>

                        <div class="social-container__link-list">

                            <a class="info__vk" href="https://vk.com/login">

                                <img src="assets/images/vk-icon.svg" alt="vk-icon" width="45" height="45">

                            </a>
                            <a class="info__facebook" href="https://ru-ru.facebook.com/">

                                <img src="assets/images/facebook-icon.svg" alt="facebook-icon" width="50" height="50">

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
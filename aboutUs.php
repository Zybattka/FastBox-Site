<?php
session_start();
?>

<!DOCTYPE html>

<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>О нас</title>
    <link rel="icon" type="image/svg" href="assets/images/logo.svg">
        <link rel="stylesheet" href="assets/css/style.css">
</head>




<body>
    <header class="header-top">
        <div class="container">
            <div class="header-top__content">
                <a class="logo" href="index.php">
                        <img class="logo__img" src="assets/images/logo.svg" alt="logo" width="50" height="50"> <b class="logo__title">FastBox</b>
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

                        <!-- Если мы авторизировались, то отображается наша аватарка и ФИО. -->

                        <!-- А если мы не авторизировались, то отображается кнопочка "войти". -->
                        <?php
                        if ($_SESSION['user']){
                            ?>
                            <li class="list__profile-container">


                            <a href="profile.php" class="profile-container__link-profile">

                                <img class="link-profile__img" src="<?= $_SESSION['user']['avatar'] ?>" alt="avatar" width="35" height="35">
                                <b class="link-profile__full-name"><?= $_SESSION['user']['full_name'] ?></b>
                            </a>

                        </li>

                        <?php
                        } else {
                        ?>
                            <li class="list__item list__item-authorization">

                                <a class="item-package__link" href="authorization.php">
                                    войти
                                </a>
                            </li>

                        <?php
                        }
                        ?>
                        
                    </ul>
                </menu>
            </div>
        </div>
    </header>

    <section class="section-about-us-content">

        <div class="container">
            <div class="about-us-box-content">
                <div class="logo-about-us">

                    <img class="logo-about-us__img" src="assets/images/logo.svg" alt="logo" width="100" height="100">
                    <b class="logo-about-us__title">FastBox -</b>
                </div>

                <div class="about-us-box-content__container-text">
                    <p class="container-text__text">
                        Мы стараемся доставлять и выдавать товары вам как можно скорее!
                            - ведь мы ценим время наших  клиентов!
                        Мы сделали доставку бесплатной, чтобы вы могли заказывать товары откуда угодно не боясь лишних расходов.
                        Вы можете посмотреть присутствует ли товар на нашем складе:
                    </p>

                    <a class="container-text__about-us-btn" href="package.php">
                        Проверить товар
                    </a>
                </div>

            </div>
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
                    <p class="info__address-text">- г. Самара, Ново-вокзальная 9,корпус- 1</p>

                    <div class="info__social-container">
                        <b class="social-container__social-text">Наши контакты в соц сетях:</b>
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
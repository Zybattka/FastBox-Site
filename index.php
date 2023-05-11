<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>FastBox</title>

    <link rel="icon" type="image/svg" href="assets/images/logo.svg">

    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>
    <!-- Шапка сайта -->

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

                        <!-- Если мы авторизировались, то отображается наша аватарка и ФИО. -->
                        <!-- А если мы не авторизировались, то отображается кнопочка "войти". -->
                        <?php
                        if ($_SESSION['user']) {
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
                                    АВТОРИЗОВАТЬСЯ
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
    <!-- Основная часть страницы -->
    <section class="section-main-content">
        <div class="container">

            <div class="section-main-content__container">

                <div class="section-main-content__left-content">

                    <img class="left-content__img" src="assets/images/logo.svg" alt="logo" width="150" height="150">
                    <h2 class="left-content__title">FastBox</h2>

                </div>
                <div class="section-main-content__right-content">

                    <div class="right-content__title-container">
                        <div class="title-container__line"></div>

                        <h1 class="title-container__title">

                            <span class="title__span">Склад</span> товаров вашей области
                        </h1>
                    </div>
                    <a href="package.php" class="right-content__btn">

                        Посмотреть посылку
                    </a>
                </div>
            </div>
            <div class="section-main-content__benefits">

                <h4 class="benefits__title">Почему выбирают именно нас:</h4>
                <div class="benefits__list-benefits">
                    <div class="list-benefits__item-benefits">

                        <img class="item-benefits__img item-benefits__img-1" src="assets/images/fast_delivery-icon.svg" alt="Fast delivery logo" width="150" height="150">
                        <div class="item-benefits__line-top"></div>


                        <h5 class="item-benefits__title">У нас молниеносная доставка товара на склад</h5>
                        <div class="item-benefits__line-bottom"></div>

                    </div>
                    <div class="list-benefits__item-benefits">

                        <img class="item-benefits__img item-benefits__img-2" src="assets/images/FastBox.svg" alt="FastBox logo" width="150" height="150">
                        <div class="item-benefits__line-top"></div>

                        <h5 class="item-benefits__title">Наши склады во всех городах рф</h5>

                        <div class="item-benefits__line-bottom"></div>

                    </div>
                    <div class="list-benefits__item-benefits">

                        <img class="item-benefits__img item-benefits__img-3" src="assets/images/delivery-home-icon.svg" alt="delivery home logo" width="150" height="150">
                        <div class="item-benefits__line-top"></div>

                        <h5 class="item-benefits__title">Доставка курьером до вашей двери - бесплатная!)</h5>
                        <div class="item-benefits__line-bottom"></div>
                    </div>
                </div>
            </div>


        </div>

    </section>

    <!-- Подвал сайта -->
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
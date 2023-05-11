<?php
session_start();

// Подключаемся к базе данных, чтобы узнать id товара.
$connect = mysqli_connect('localhost', 'root', 'admin', 'FastBox_bd');

if (!$connect) {

    die('Произошла ошибка при подключении к базе данных');
}

$product_id = $_GET['id'];
// Таким образом мы получим id продукта из базы данных.

$products_info = mysqli_query($connect, "SELECT * FROM `products2` WHERE `id` = '$product_id'");

$products_info = mysqli_fetch_assoc($products_info);
?>

<!doctype html>

<html lang="ru">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"

          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Изменение данных о товаре</title>

    <link rel="icon" type="img/svg" href="assets/images/logo.svg">

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
<!-- Основная часть страницы -->

<section class="detailed-information-content">

    <div class="container">

        <div class="detailed-information-content__detailed-container">

            <div class="detailed-container__detailed-img-container">

                <img class="detailed-img-container__img" src="<?= $products_info['img_products'] ?>" alt="" width="200" height="200">

            </div>

            <div class="detailed-container__detailed-text-container">

                <h1 class="detailed-text-container__title">

                    <?= $products_info['name_products'] ?>

                </h1>
                <h5 class="etailed-text-container__descr-title">

                    Описание:
                </h5>
                <p class="detailed-text-container__descr">
                    <?= $products_info['descr_products'] ?>

                </p>
                <h5 class="etailed-text-container__descr-title">

                    Дата прибытия товара:
                </h5>

                <p class="detailed-text-container__descr">
                    <?= $products_info['data_products'] ?>
                </p>
                <h5 class="etailed-text-container__descr-title">

                    Кол-во товара:
                </h5>
                <p class="detailed-text-container__descr">

                    <?= $products_info['numbers_products'] ?>
                </p>
                <h5 class="etailed-text-container__descr-title">
                    Номер товара:
                </h5>
                <p class="detailed-text-container__descr">

                    <?= $products_info['batch_number'] ?>
                </p>
                <h5 class="etailed-text-container__descr-title">

                    Откуда был привезён товар:
                </h5>
                <p class="detailed-text-container__descr">

                    <?= $products_info['from_what_city'] ?>
                </p>
                <h5 class="etailed-text-container__descr-title">
                    Поставщик товара:
                </h5>
                <p class="detailed-text-container__descr">

                    <?= $products_info['provider'] ?>
                </p>
                <h5 class="etailed-text-container__descr-title">

                    Состав товара:
                </h5>
                <p class="detailed-text-container__descr">

                    <?= $products_info['compound'] ?>

                </p>
                <h5 class="etailed-text-container__descr-title">

                    Срок годности:

                </h5>
                <p class="detailed-text-container__descr">

                    <?= $products_info['best_before_date'] ?>
                </p>
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
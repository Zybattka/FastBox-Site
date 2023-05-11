<?php
    session_start();

    // Подключаемся к базе данных, чтобы узнать id товара.


    $connect = mysqli_connect('localhost', 'root', 'admin', 'FastBox_bd');


    if (!$connect) {

        die('Произошла ошибка при подключении к базе данных');
    }

    $product_id = $_GET['id'];

    // Таким образом мы получим id продукта из базы данных.

    $products_info = mysqli_query($connect, "SELECT * FROM `products` WHERE `id` = '$product_id'");

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
<section class="update-products-content">
    <div class="container">
        <form class="update-products__form" action="include/update.php" method="post" enctype="multipart/form-data">
            <div class="form__logo-update-products">

                <img class="logo-update-products" src="assets/images/logo.svg" alt="logo" width="50" height="50">
                <b class="update-products__title">FastBox</b>
            </div>
            <b class="update-products-form__title">Изменение информации о товаре</b>

            <label class="update-products-form__label">Наименование продукта:</label>
<!-- Создаём невидимый input (type="hidden") для того, чтобы при отправки по кнопке на файлик "update.php" мы могли получить id того товара, которому мы изменяем информацию о товаре -->
            <input type="hidden" name="id" value="<?= $products_info['id']?>">
            <input class="update-products-form__input" type="text" name="name_products" value="<?= $products_info['name_products'] ?>">
            <label class="update-products-form__label">Описание:</label>
            <textarea class="update-products-form__textarea" name="descr_products"><?= $products_info['descr_products'] ?></textarea>
            <label class="update-products-form__label">Прибыл товар:</label>

            <input class="update-products-form__input" type="text" name="data_products" value="<?= $products_info['data_products'] ?>">
            <label class="update-products-form__label">Кол-во товара:</label>

            <input class="update-products-form__input" type="text" name="numbers_products" value="<?= $products_info['numbers_products'] ?>">
            <label class="add-products-form__label">Номер товара:</label>
            <input class="add-products-form__input" type="text" name="batch_number" value="<?= $products_info['batch_number'] ?>">
            <label class="add-products-form__label">Откуда был привезён товар:</label>
            <input class="add-products-form__input" type="text" name="from_what_city" value="<?= $products_info['from_what_city'] ?>">
            <label class="add-products-form__label">Поставщик товара:</label>



            <input class="add-products-form__input" type="text" name="provider" value="<?= $products_info['provider'] ?>">
            <label class="add-products-form__label">Состав товара:</label>
            <input class="add-products-form__input" type="text" name="compound" value="<?= $products_info['compound'] ?>">
            <label class="add-products-form__label">Срок годности:</label>
            <input class="add-products-form__input" type="text" name="best_before_date" value="<?= $products_info['best_before_date'] ?>">
            <button class="update-products-form__btn" type="submit">изменить название товара</button>
        </form>
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
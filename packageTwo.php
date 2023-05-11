<?php
session_start();
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Второй склад</title>

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
                            Посмотреть товары
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
<section class="package-two-content">

    <div class="container">

        <div class="package-two-content__package-text-container">

            <h1 class="package-two-text-container__title">Второй Склад:</h1>

            <a href="package.php" class="package-two-text-container__link">посмотреть первый склад</a>

        </div>
        <?php
        $connect = mysqli_connect('localhost', 'root', 'admin', 'FastBox_bd');
        $products_card = "SELECT * FROM `products2`";

        if ($products_output = $connect -> query($products_card)) {
            foreach($products_output as $products_info) {
                ?>
                <div class="products-card">
                    <img class="products-card__products-img" src="<?= $products_info['img_products'] ?>" alt="products img" width="180" height="180">
                    <div class="products-card__container-info-products">
                        <b class="container-info-products__title">
                            <?= $products_info['name_products'] ?>
                        </b>
                        <div class="container-info-products__descr-box">
                            <span class="descr-box__span-descr">Описание:</span>
                            <p class="descr-box__descr-products">
                                <?= $products_info['descr_products'] ?>
                            </p>
                        </div>

                        <div class="descr-products__data-container">
                            <div class="data-container__data-box">
                                <span class="data-container__span-data">Прибыл товар:</span>
                                <p class="data-container__data-products">
                                    <?= $products_info['data_products'] ?>
                                </p>
                            </div>

                            <div class="data-container__numbers-products-box">
                                <span class="numbers-products-box__numbers-products-span">Кол-во товара:</span>
                                <p class="numbers-products-box__numbers-products">
                                    <?= $products_info['numbers_products'] ?>
                                </p>
                            </div>
                            <?php
                            if (!empty($_SESSION['user']['status'] == 'admin')) {
                                ?>
                                <a class="data-container__btn-update-product" href="updateProducts2.php?id=<?= $products_info['id']?>">
                                    Изменить товар
                                </a>
                                <a class="data-container__btn-delete-product" href="include/deleteProducts2.php?id=<?= $products_info['id'] ?>">
                                    Удалить товар
                                </a>
                                <?php
                            }
                            ?>
                            <a href="detailedInformation2.php?id=<?= $products_info['id'] ?>" class="data-container__btn-detailed-information">
                                Детальная информация
                            </a>

                        </div>

                    </div>
                </div>
                <?php
            }
            $products_output->free();
        } else {
            echo "Ошибка в загрузке поставок. Мы работаем над устранением этой ошибки.";
        }
        $connect -> close();
        ?>
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

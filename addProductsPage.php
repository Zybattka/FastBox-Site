<?php
session_start();
require_once './include/addProducts.php';

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавление товара</title>
    <link rel="icon" type="img/svg" href="assets/images/logo.svg">
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

    <section class="add-products-content">
        <div class="container">

            <form class="add-products-form" action="include/addProducts.php" method="post" enctype="multipart/form-data">
                <div class="form__logo-add-products">

                    <img class="logo-add-products" src="assets/images/logo.svg" alt="logo" width="50" height="50">
                    <b class="logo-add-products__title">FastBox</b>

                </div>

                <b class="add-products-form__title">Добавление товара</b>

                <label class="add-products-form__label">Наименование продукта:</label>
                <input class="add-products-form__input" type="text" name="name_products">
                <label class="add-products-form__label">Изображение товара:</label>
                <input class="add-products-form__input" type="file" name="img_products">
                <label class="add-products-form__label">Описание продукта:</label>
                <textarea class="add-products-form__textarea" name="descr_products"></textarea>
                <label class="add-products-form__label">Дата прибытия товара:</label>
                <input class="add-products-form__input" type="text" name="data_products">
                <label class="add-products-form__label">Кол-во товаров:</label>

                <input class="add-products-form__input" type="text" name="numbers_products">
                <label class="add-products-form__label">Номер товара:</label>
                <input class="add-products-form__input" type="text" name="batch_number">
                <label class="add-products-form__label">Откуда был привезён товар:</label>
                <input class="add-products-form__input" type="text" name="from_what_city">
                <label class="add-products-form__label">Поставщик товара:</label>
                <input class="add-products-form__input" type="text" name="provider">
                <label class="add-products-form__label">Состав товара:</label>
                <input class="add-products-form__input" type="text" name="compound">


                <label class="add-products-form__label">Срок годности:</label>
                <input class="add-products-form__input" type="text" name="best_before_date">
                <button class="add-products-form__btn" type="submit">Добавить товар на основной склад</button>
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
                    <b class="info__address-title">Наш офис по адресу:</b>
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
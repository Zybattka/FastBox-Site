<?php
session_start();

// Если переменная "user" не существует, то мы автоматически перекидываем пользователя на страницу с авторизацией.
if (!$_SESSION['user']) {
    header('Location: authorization.php');
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Профиль</title>
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
                                Посмотреть товар
                            </a>
                        </li>
                    </ul>
                </menu>

            </div>
        </div>
    </header>
    <!-- Основная часть страницы -->
    <section class="profile-content">
        <div class="container">
            <!-- Достаём из запущенной сесси аватарку, имя, логин и почту пользователя -->
            <div class="profile-content__container-info">

                <img class="container-info__img" src="<?= $_SESSION['user']['avatar'] ?>" alt="avatar" width="150" height="150">
                <div class="container-info__box-info">

                    <h4 class="box-info__full-name">ФИО: <span class="full-name__span"><?= $_SESSION['user']['full_name'] ?></span></h4>

                    <p>Login: <span><?= $_SESSION['user']['login'] ?></span></p>
                    <p>Email: <span><?= $_SESSION['user']['email'] ?></span></p>

                    <p>Статус: <span><?= $_SESSION['user']['status'] ?></span></p>
                    <div class="box-info__btn-container">
                        <?php
                        // Проверка на то, что ты должен быть админом
                        if (!empty($_SESSION['user']['status'] == 'admin')) {

                        ?>

                            <a class="add-products-btn" href="addProductsPage.php">Добавить товар на первый склад</a>

                            <a class="add-products-btn" href="addProductsPage2.php">Добавить товар на второй склад</a>
                        <?php
                        }
                        ?>
                        <a class="profile-package-view" href="package.php">Посмотреть товары</a>

                        <a class="profile-logout-btn" href="include/logout.php">Выход из профиля</a>
                    </div>
                </div>

            </div>
            <div class="profile-line"></div>
            <?php
            // Проверка на то, что ты должен быть админом

            if (!empty($_SESSION['user']['status'] == 'admin')) {
            ?>
                <div class="profile-users-container">

                    <h3 class="profile-users-container__title">
                        Все пользователи:
                    </h3>
                    <?php

                    $connect = mysqli_connect('localhost', 'root', 'admin', 'FastBox_bd');

                    $users_card_database = "SELECT * FROM `users`";


                    if ($users_card = $connect -> query($users_card_database)) {
                        foreach ($users_card as $card_user) {
                        ?>
                            <div class="profile-user-container__card-user">
                                <img class="card-user__img" src="<?= $card_user['avatar'] ?>" alt="" width="150" height="150">

                                <div class="card-user__info-box">

                                    <h4 class="info-box__user-full-name">
                                        ФИО: <span class="user-full-name__span"><?= $card_user['full_name'] ?></span>
                                    </h4>
                                    <p class="info-box__login-user">
                                        Login: <span class="login-user__span"><?= $card_user['login'] ?></span>
                                    </p>
                                    <p class="info-box__email-user">
                                        Email: <span class="email-user__span"><?= $card_user['email'] ?></span>
                                    </p>

                                    <p class="info-box__status-user">
                                        Статус: <span class="status-user__span"><?= $card_user['status'] ?></span>
                                    </p>
                                    <?php
                                    if (!empty($card_user['status'] == 'user')) {
                                        ?>
                                            <a class="card-user__btn-delete" href="include/deleteUsers.php?id=<?= $card_user['id'] ?>">Удалить пользователя</a>
                                        <?php
                                    }
                                    ?>
                                </div>
                                

                            </div>
                        <?php
                        }
                    }
                    ?>
                </div>
            <?php
            }
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
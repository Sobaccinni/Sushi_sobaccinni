<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sushi</title>
    <!-- favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="manifest" href="img/favicon/site.webmanifest">
    <!-- favicon -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/cart.css">
    <link rel="stylesheet" href="css/reg.css">
    <link rel="stylesheet" href="css/user.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/about.css">
    <link rel="stylesheet" href="css/success.css">
    <script>function toggleMenu() {
        const menu = document.querySelector('.burger-menu');
        const overlay = document.querySelector('.overlay');
        const icon = document.querySelector('.burger__menu_icon');
        menu.classList.toggle('active');
        overlay.style.display = overlay.style.display === 'block' ? 'none' : 'block';
        icon.style.display = icon.style.display === 'none' ? 'block' : 'none';
    }</script>
     <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
     <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
</head>
<body>
    <header class="header">
        <div class="header-top">
            <div class="container">
                <div class="header__row">
                    <!-- Бургер меню -->
                    <div class="overlay" onclick="toggleMenu()"></div>
                    <div class="burger-menu">
                        <div class="burger-menu__header">
                            <span class="close-btn" onclick="toggleMenu()">&#x2715;</span>
                        </div>
                        <ul class="burger-menu__list">
                            <li><div class="burger__search"><input type="search" placeholder="Search"></div></li>
                            <li><a href="login.php" class="burger-menu__link">Войти</a></li>
                            <li><a href="about.php" class="burger-menu__link">О нас</a></li>
                            <li><a href="cart.php" class="burger-menu__link">Корзина</a></li>
                            <li><a href="admin.php" class="burger-menu__link">Админ панель(test)</a></li>
                        </ul>   
                    </div>
                    <div class="burger__menu_icon" onclick="toggleMenu()">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <!-- Бургер меню -->
                    <div class="header__row_logo">
                        
                        <a href="index.php">
                            <img src="img/logo.svg" alt="Logo" class="logo-img">
                        </a>
                    </div>

                    <div class="header__row_search">
                        <form action="">
                            <input type="search" placeholder="Search">
                        </form>
                    </div>
                    <?php
                        if(!isset($_SESSION['user'])){?>
                        <div class="header__row_btn">
                            <a href="../reg.php">Вход/Регистрация</a>
                        </div>
                        <?php }else{?>
                        <div class="header__row_btn">
                        <?php if($_SESSION['user']['role'] == 2){ ?>
                            <a href="../admin.php">Админ панель</a>
                            <?php }elseif($_SESSION['user']['role'] == 1){?>
                            <a href="../user.php">Личный кабинет</a>
                        </div>
                     <?php  }} ?>


                </div>
            </div>
        </div>
    </header>
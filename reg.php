<?php
    include "components/core.php";
    include "components/header.php";

?>
<main>
<div class="reg_main__container">
    <div class="reg_main__header">
        <div class="reg_underline">
            <h1><a href="reg.php">Регистрация</a></h1>
        </div>
        <h1><a href="login.php">Войти</a></h1>
    </div>
    <form action="" class="reg_form">
        <p>Ваше имя</p>
        <input type="text" class="text">
        <p>Эл.почта</p>

        <input type="text" class="text">
        <p>Придумайте пароль</p>

        <input type="text" class="text">
        <div class="reg_form__submit">
        <input type="submit" class="submit" value="Зарегистрироваться">
        </div>
    </form>
    <div class="reg_bottom">
        <a href="user.php">
            <div class="reg_link">
                <p>Личный кабинет</p>
            </div>
        </a>
        <a href="admin.php">
            <div class="reg_link">
                <p>Админ</p>
            </div>
        </a>
    </div>
        
    </div>
</main>
</body>
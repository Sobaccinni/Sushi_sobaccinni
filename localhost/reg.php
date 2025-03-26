<?php
    include "components/core.php";

    if ($_POST){
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $errors = [];
        if(empty($fullname) or empty($email) or empty($password)){
            $errors = "Все поля должны быть заполнены!";
        }else{
            $sql = "INSERT INTO users(`fullname`, `email`, `password`, `role_id`) 
                    VALUES ('$fullname','$email','$password', 1)";
            $result = $link->query($sql);
            header("Location:user.php");
        }
    }

    include "components/header2.php";

?>
<main>
<div class="reg_main__container">
    <div class="reg_main__header">
        <div class="reg_underline">
            <h1><a href="reg.php">Регистрация</a></h1>
        </div>
        <h1><a href="login.php">Войти</a></h1>
    </div>
    <form action="" class="reg_form" method="post">
        <p>Ваше имя</p>
        <input type="text" class="text" name="fullname">

        <p>Эл.почта</p>
        <input type="email" class="text" name="email">

        <p>Придумайте пароль</p>
        <input type="password" class="text" name="password">
        <div class="reg_errors">
            <?php 
            if(!empty($errors)){
                echo "<p style='color: red;'>$errors</p>";
            }
            ?>
        </div>
        <div class="reg_form__submit">
            <input type="submit" class="submit" value="Зарегистрироваться">
        </div>
    </form>
    <div class="reg_bottom">

        <?php if($_SESSION['user']['role']==2){?>
        <a href="admin.php">Админ панель</a>
        <?php }?>
    </div>
        
    </div>
</main>
</body>
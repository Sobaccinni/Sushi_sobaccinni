<?php
    include "components/core.php";

    if ($_POST) {
        $users = $link->query("SELECT * FROM `users` WHERE  `email` = '{$_POST['email']}'
        AND `password`='{$_POST['password']}'");
        if($users->num_rows != 0){
            foreach($users as $key=>$value){
        $_SESSION['user'] = [
            'id'=>$value['id'],
            'role'=>$value['role_id'],
            'fullname'=>$value['fullname'],
            'email'=>$value['email'],
            
        ];

        }
        if($_SESSION['user']['role']==2){
            header("Location:admin.php");
        }
        if($_SESSION['user']['role']==1){
            header("Location:user.php");

        }
        }else{
            $error = "Неверный логин или пароль!";
        }
        
        
        }

    include "components/header2.php";

?>
<main>
<div class="reg_main__container">
    <div class="reg_main__header">
        <h1><a href="reg.php">Регистрация</a></h1>
        <div class="reg_underline">
            <h1><a href="login.php">Войти</a></h1>
        </div>
    </div>

    <form action="" method="post">
        <p>Эл.почта</p>
        <input type="email" class="text" name="email">
        <p>Пароль</p>

        <input type="password" class="text" name="password">
        <div class="reg_errors">
        <?php
            if(isset($error)){
            echo "<p style='color: red;'>$error</p>";
        } ?>
        </div>
        <div class="reg_form__submit">
        <input type="submit" class="submit" value="Войти">
        </div>
    </form>
    </div>
</main>
</body>
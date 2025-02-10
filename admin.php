<?php
    include "components/core.php";

    include "components/header.php";
?>
<main>
    <div class="container">
        <h1>Панель администратора</h1>
        <div class="admin_main__container">
            <div class="admin_main__insert">
                <h2>Добавить товар</h2>
                <form action="action/add-product.php" class="admin_insert__form" enctype="multipart/form-data" method="post">
                    <input type="text" class="admin_insert__text" name="name" placeholder="Название">
                    <input type="text" class="admin_insert__text" name="desc" placeholder="Описание">
                    <input type="text" class="admin_insert__text" name="weight" placeholder="Вес">
                    <input type="text" class="admin_insert__text" name="price" placeholder="Цена">
                    <input type="text" class="admin_insert__text" name="category" placeholder="Категория (id)">
                    <div class="admin_insert__bottom">
                        <p>Загрузить изображение</p>
                        <input type="file" id="img" name="img" accept="image/*" required>
                        <input type="submit" value="Добавить" class="admin_submit">
                    </div>
                </form>
            </div>
            <div class="admin_main__delete">
                <h2>Удалить товар</h2>
                <form action="" class="admin_delete__form">
                    <input type="text" class="admin_delete__text" name="id" placeholder="id товара">
                    <div class="admin_insert__bottom">
                    <p>Загрузить изображение</p>
                    <input type="submit" value="Удалить " class="admin_submit">
                </div>
                </form>
            </div>
            <div class="admin_main__update">
                <div class="admin_update__top">
                    <h3>Изменить товар</h3>
                    <input type="text" placeholder="id товара" class="admin_insert__text">
                </div>
                <div class="admin_updete__mid">
                    <h3>Изменить на</h3>
                    <form action="" class="admin_insert__form">
                        <input type="text" class="admin_insert__text" name="name" placeholder="Название">
                        <input type="text" class="admin_insert__text" name="desc" placeholder="Описание">
                        <input type="text" class="admin_insert__text" name="weight" placeholder="Вес">
                        <input type="text" class="admin_insert__text" name="price" placeholder="Цена">
                        <div class="admin_insert__bottom">
                        <p>Загрузить изображение</p>
                        <input type="submit" value="Обновить" class="admin_submit">
                    </div>
                    </form>
                </div>
            </div>
            <div class="admin_main__bottom">
                <div class="admin_main__bottom_top">
                    <h2>Отзывы</h2>
                    <p>Пользователь: Иванов Иван</p>
                    <p>Отзыв:</p>
                </div>
                <textarea name="feedback" id="" rows="5" readonly></textarea>
                <div class="admin_main__bottom_bottom">
                    <button class="admin_confirm">Принять</button>
                    <button class="admin_decline">Отклoнить</button>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>
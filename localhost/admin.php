<?php
    include "components/core.php";

    include "components/header2.php";
?>
<main>
    <div class="container">
        <h1>Панель администратора</h1>
        <a href="logout.php">Выход</a>
        <div class="admin_main__container">
            <div class="admin_main__insert">
                <h2>Добавить товар</h2>
                <form action="add-product.php" class="admin_insert__form" enctype="multipart/form-data" method="post">
                    <input type="text" class="admin_insert__text" name="name" placeholder="Название">
                    <input type="text" class="admin_insert__text" name="desc" placeholder="Описание">
                    <input type="text" class="admin_insert__text" name="weight" placeholder="Вес">
                    <input type="text" class="admin_insert__text" name="price" placeholder="Цена">
                    <input type="text" class="admin_insert__text" name="category" placeholder="Категория (id)">
                    <div class="admin_insert__bottom">
                        <p>Загрузить изображение</p>
                        <input type="file" id="img" name="img" accept="image/*" required>
                        <button class="admin_submit">Добавить</button>
                    </div>
                </form>
            </div>
            <div class="admin_main__delete">
                <h2>Удалить товар</h2>
                <form action="delete_product.php" class="admin_delete__form" method="post">
                    <input type="text" class="admin_delete__text" name="delete_id" placeholder="id товара">
                    <div class="admin_insert__bottom">
                    <br>
                    <button class="admin_submit">Удалить</button>
                    </div>
                </form>
            </div>
            <div class="admin_main__update">
                <form action="update.php" class="admin_insert__form" method="post">
                <div class="admin_update__top">
                    <h2>Изменить товар</h2>
                    <input type="text" name="update_id" placeholder="id товара" class="admin_insert__text">
                </div>
                <div class="admin_updete__mid">
                    <h3>Новое значение</h3>
                    
                        <input type="text" class="admin_insert__text" name="update_name" placeholder="Название">
                        <input type="text" class="admin_insert__text" name="update_desc" placeholder="Описание">
                        <br><br>
                        <input type="text" class="admin_insert__text" name="update_weight" placeholder="Вес">
                        <input type="text" class="admin_insert__text" name="update_price" placeholder="Цена">
                        <div class="admin_insert__bottom">
                        <br>
                        <button class="admin_submit">Обновить</button>
                    </div>
                    </form>
                </div>
            </div>

            <div class="admin_main__bottom">
                <div class="admin_main__bottom_top">
                    <h2>Заказы</h2>
                    <p>Пользователь: Иванов Иван</p>
                    <p>Продукты:</p>
                    <div class="admin_orders_products">
                        
                    </div>
                    <p>Стоимость:</p>
                </div>
                <div class="admin_main__bottom_bottom">
                    <button class="admin_confirm">В работу</button>
                    <button class="admin_decline">Отклoнить</button>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>
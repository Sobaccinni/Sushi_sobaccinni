<?php
    include "components/core.php";
    include "components/header.php";
?>
<main>  
    <div class="container">
        <div class="user_main__top">
            <h1>Личный кабинет</h1>
            <p>Имя: Иванов Иван</p>
            <p>Эл.почта: ivanov@mail.ru</p>
        </div>
        <div class="user_main__orders">
            <div class="user_main__orders_top">
                <h2>Ваши предыдущие заказы</h2>
                <p>23.10.2024</p>
            </div>
            <div class="user_main__orders_elems">
                <div class="user_main__orders_elem">
                    <div class="user_main__orders_elem_img">
                        <img src="img/1.svg" alt="">
                    </div>
                    <div class="user_main__orders_elem_desc">
                        <div class="user_main__orders_elem_top">
                            <p>Классика</p>
                            <p style="font-size: 14px;">500г</p>
                        </div>
                        <p style="font-size: 14px;">Набор, в который входят классические роли с натуральными ингредиентами. Идеальный выбор для тех, кто хочет насладиться традиционными вкусами японской кухни.</p>
                        <div class="user_main__orders_elem_bottom">
                            <p>1000р</p>
                            <div class="user_counter">
                                <div class="user_button_minus"></div>
                                <div class="user_value" id="value">1</div>
                                <div class="user_button_plus">+</div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="user_main__orders_elem">
                    <div class="user_main__orders_elem_img">
                        <img src="img/1.svg" alt="">
                    </div>
                    <div class="user_main__orders_elem_desc">
                        <div class="user_main__orders_elem_top">
                            <p>Классика</p>
                            <p style="font-size: 14px;">500г</p>
                        </div>
                        <p style="font-size: 14px;">Набор, в который входят классические роли с натуральными ингредиентами. Идеальный выбор для тех, кто хочет насладиться традиционными вкусами японской кухни.</p>
                        <div class="user_main__orders_elem_bottom">
                            <p>1000р</p>
                            <div class="user_counter">
                                <div class="user_button_minus"></div>
                                <div class="user_value" id="value">1</div>
                                <div class="user_button_plus">+</div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="user_repeat">
                <p>Повторить</p>
            </div>
            
        </div>
        <div class="user_feedback">
            <h2>Оставить отзыв</h2>
            <textarea name="feedback" id="" rows="5" placeholder="Введите отзыв"></textarea>
            <button>Отправить</button>
        </div>
    </div>
</main>
 <?php
    include "components/footer.php";
 ?>
</body>
</html>
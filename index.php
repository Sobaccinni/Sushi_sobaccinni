
<?php
    include "components/core.php";
    include "components/header.php";
?>
        <div class="header-bottom">
            <div class="container">
                <div class="header__row_menu">
                    <ul class="header-menu">
                        <li><a href="#nabor" class="header__menu_link">Наборы</a></li>
                        <li><a href="#rolls" class="header__menu_link">Роллы</a></li>
                        <li><a href="#sushi" class="header__menu_link">Суши</a></li>
                        <li><a href="#sashimi" class="header__menu_link">Сашими</a></li>
                        <li><a href="#salat" class="header__menu_link">Салаты</a></li>
                        <li><a href="#drink" class="header__menu_link">Напитки</a></li>
                        <li><a href="#desert" class="header__menu_link">Десерты</a></li>
                        <li><a href="#dop" class="header__menu_link">Дополнительно</a></li>
                    </ul>
                </div>
            </div>
        </div>
<section class="slider">
        <img src="img/slider.svg" alt="">
        <img src="img/slider.svg" alt="">
        <img src="img/slider.svg" alt="">
    </section>
    <main>

    <div class="container">
        <div class="main__top">
            <h3 id="nabor">Наборы</h3>
            <div class="main__row_btn">
                <a href="cart.php">Корзина</a>
            </div>
        </div>
        <?php
                $sql = "SELECT * FROM `product` WHERE `category_id` = 1";
                $result = $link->query($sql);

                if (!$result) {
                    die("Ошибка запроса: " . $link->error);
                }

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $name = $row['name'];
                        $description = $row['description'];
                        $weight = $row['weight'];
                        $price = $row['price'];
                        $img = $row['img'];

                        // Проверка существования файла
                        if (!file_exists($img)) {
                            echo "Файл изображения не найден: " . $img . "<br>";
                            continue;
                        }
            ?>
            <div class="main__row">
                <div class="main__row_elem">
                    <img src="<?php echo $img; ?>" alt="<?php echo $name; ?>">
                    <div class="main__row_elem_top">
                        <p><?php echo $name; ?></p>
                        <p><?php echo $weight; ?> г</p>
                    </div>
                    <p><?php echo $description; ?></p>
                    <div class="main__row_elem_bottom">
                        <p><?php echo $price; ?> руб.</p>
                        <div class="main__row_elem_button">
                            <a href="#">В корзину</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                    }
                } else {
                    echo "Нет продуктов в этой категории.";
                }
            ?>

        <h3 id="rolls">Роллы</h3>
        <div class="main__row">
            <div class="main__row_elem">
                <img src="img/1.svg" alt="">
                <div class="main__row_elem_top">
                    <p>Калифорния</p>
                    <p>1100г</p>
                </div>
                <p>Классический ролл с крабовыми палочками, авокадо и огурцом, обсыпанный тобико </p>
                <div class="main__row_elem_bottom">
                    <p>1000p</p>
                    <div class="main__row_elem_button">
                        <a href="#">В корзину</a>
                    </div>
                </div>
            </div>
        </div>


        <h3 id="sushi">Суши</h3>
        <div class="main__row">
            <div class="main__row_elem">
                <img src="img/1.svg" alt="">
                <div class="main__row_elem_top">
                    <p>Суши с лососем</p>
                    <p>1100г</p>
                </div>
                <p>традиционные кусочки риса с нежным лососем </p>
                <div class="main__row_elem_bottom">
                    <p>1000p</p>
                    <div class="main__row_elem_button">
                        <a href="#">В корзину</a>
                    </div>
                </div>
            </div>
        </div>


        <h3 id="sashimi">Сашими</h3>
        <div class="main__row">
            <div class="main__row_elem">
                <img src="img/1.svg" alt="">
                <div class="main__row_elem_top">
                    <p>Сашими с лососем</p>
                    <p>1100г</p>
                </div>
                <p>свежие тонкие ломтики лосося, подаются с соевым соусом</p>
                <div class="main__row_elem_bottom">
                    <p>1000p</p>
                    <div class="main__row_elem_button">
                        <a href="#">В корзину</a>
                    </div>
                </div>
            </div>
        </div>


        <h3 id="salat">Салаты</h3>
        <div class="main__row">
            <div class="main__row_elem">
                <img src="img/1.svg" alt="">
                <div class="main__row_elem_top">
                    <p>Салат Морияси</p>
                    <p>1100г</p>
                </div>
                <p>Классический ролл с крабовыми палочками, авокадо и огурцом, обсыпанный тобико </p>
                <div class="main__row_elem_bottom">
                    <p>1000p</p>
                    <div class="main__row_elem_button">
                        <a href="#">В корзину</a>
                    </div>
                </div>
            </div>
        </div>


        <h3 id="drink">Напитки</h3>
        <div class="main__row">
            <div class="main__row_elem">
                <img src="img/1.svg" alt="">
                <div class="main__row_elem_top">
                    <p>Калифорния</p>
                    <p>1100г</p>
                </div>
                <p>Классический ролл с крабовыми палочками, авокадо и огурцом, обсыпанный тобико </p>
                <div class="main__row_elem_bottom">
                    <p>1000p</p>
                    <div class="main__row_elem_button">
                        <a href="#">В корзину</a>
                    </div>
                </div>
            </div>
        </div>


        <h3 id="desert">Десрты</h3>
        <div class="main__row">
            <div class="main__row_elem">
                <img src="img/1.svg" alt="">
                <div class="main__row_elem_top">
                    <p>Калифорния</p>
                    <p>1100г</p>
                </div>
                <p>Классический ролл с крабовыми палочками, авокадо и огурцом, обсыпанный тобико </p>
                <div class="main__row_elem_bottom">
                    <p>1000p</p>
                    <div class="main__row_elem_button">
                        <a href="#">В корзину</a>
                    </div>
                </div>
            </div>
        </div>


        <h3 id="dop">Дополнительно</h3>
        <div class="main__row">
            <div class="main__row_elem">
                <img src="img/1.svg" alt="">
                <div class="main__row_elem_top">
                    <p>Калифорния</p>
                    <p>1100г</p>
                </div>
                <p>Классический ролл с крабовыми палочками, авокадо и огурцом, обсыпанный тобико </p>
                <div class="main__row_elem_bottom">
                    <p>1000p</p>
                    <div class="main__row_elem_button">
                        <a href="#">В корзину</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
    include "components/footer.php";
 ?>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="slick/slick.min.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $('.slider').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2000,
});
  });
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});
</script>
</body>

</html>
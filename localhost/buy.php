<?php
session_start();
include "components/core.php";

if (!isset($_SESSION['user']['id'])) {
    die("Ошибка: пользователь не авторизован.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['phone']) && isset($_POST['adress'])) {
    // Проверка и подготовка данных
    $user_id = $_SESSION['user']['id'];
    $phone = htmlspecialchars(trim($_POST['phone']));
    $address = htmlspecialchars(trim($_POST['adress']));
        
    if (empty($phone) || empty($address)) {
        die("Ошибка: заполните все обязательные поля.");
    }

    // Получаем товары из корзины
    $sql = "SELECT c.product_id, p.name, p.price, p.weight, p.img 
            FROM cart c 
            JOIN product p ON c.product_id = p.id 
            WHERE c.user_id = ?";
    $stmt = $link->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $cart_items = [];
    $total_price = 0;
    
    while ($row = $result->fetch_assoc()) {
        $cart_items[] = [
            'product_id' => $row['product_id'],
            'name' => $row['name'],
            'price' => $row['price'],
            'weight' => $row['weight'],
            'img' => $row['img'],
            'quantity' => 1 // Можно добавить количество, если нужно
        ];
        $total_price += $row['price'];
    }
    $stmt->close();
    
    if (empty($cart_items)) {
        die("Ошибка: корзина пуста.");
    }

    // Создание заказа
    $sql = "INSERT INTO `orders` (`user_id`, `phone`, `address`, `total`, `items_json`) 
            VALUES (?, ?, ?, ?, ?)";
    $stmt = $link->prepare($sql);
    $items_json = json_encode($cart_items, JSON_UNESCAPED_UNICODE);
    $stmt->bind_param("issds", $user_id, $phone, $address, $total_price,  $items_json);
    $stmt->execute();
    $order_id = $stmt->insert_id;
    $stmt->close();

    // Очистка корзины
    $sql = "DELETE FROM cart WHERE user_id = ?";
    $stmt = $link->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->close();

    // Перенаправление на страницу успеха
    header("Location: order_success.php?order_id=" . $order_id);
    exit();
}

include "components/header2.php";    
?>

<main>
    <form action="buy.php" method="post">
        <div class="buy_container">
            <div class="buy_user_data">
                <h3>Данные покупателя</h3>
                <p>Укажите телефон</p>
                <input type="text" name="phone" required value="<?= $_POST['phone'] ?? ''; ?>">
                <p>Укажите адрес</p>
                <input type="text" name="adress" required value="<?= $_POST['adress'] ?? ''; ?>">
                <input type="hidden" name="payment_method" id="paymentMethod" value="online">
            </div>
            <div class="buy_choose">
                <button type="button" id="onlineButton" class="payment-btn active">Онлайн</button>
                <button type="button" id="offlineButton" class="payment-btn">При получении</button>
            </div>
            <div class="buy_bottom">
                <p>Сумма заказа: <span id="totalPrice"><?= $_POST['order_summ'] ?? '0'; ?></span> руб.</p>
                <div class="buy_button">
                    <button type="submit">Оформить заказ</button>
                </div>
            </div>
        </div>
    </form>
</main>

<script>
document.addEventListener("DOMContentLoaded", function () {
    // Обработка выбора способа оплаты
    const onlineButton = document.getElementById("onlineButton");
    const offlineButton = document.getElementById("offlineButton");
    const paymentMethod = document.getElementById("paymentMethod");
    const paymentButtons = document.querySelectorAll('.payment-btn');

    paymentButtons.forEach(button => {
        button.addEventListener('click', function() {
            paymentButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            paymentMethod.value = this.id === 'onlineButton' ? 'online' : 'offline';
        });
    });

    // Можно добавить валидацию формы перед отправкой
    document.querySelector('form').addEventListener('submit', function(e) {
        const phone = this.elements['phone'].value.trim();
        const address = this.elements['adress'].value.trim();
        
        if (!phone || !address) {
            e.preventDefault();
            alert('Заполните все обязательные поля!');
        }
    });
});
</script>

<?php include "components/footer.php"; ?>
</body>
</html>
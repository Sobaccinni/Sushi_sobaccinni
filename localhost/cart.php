<?php
session_start();
include "components/core.php";

if (!isset($_SESSION['user']['id'])) {
    die("Ошибка: пользователь не авторизован.");
}

$user_id = $_SESSION['user']['id'];
$sql = "SELECT c.id, c.user_id, c.product_id, p.name, p.description, p.price, p.weight, p.img 
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
    $cart_items[] = $row; // Сохраняем все данные товара
    $total_price += $row['price'];
}
$stmt->close();

include "components/header2.php";
?>

<main>
    <?php if (count($cart_items) > 0): ?>
        <div class="cart_container">
            <form id="cart-form" action="buy.php" method="post">
                <div class="cart_main_row">
                    <?php foreach ($cart_items as $item): ?>
                        <div class="main__row_elem" data-price="<?= $item['price']; ?>" data-id="<?= $item['id']; ?>">
                            <img src="<?= $item['img']; ?>" alt="<?= $item['name']; ?>">
                            <div class="main__row_elem_top">
                                <p><?= $item['name']; ?></p>
                                <p><?= $item['weight']; ?> г</p>
                            </div>
                            <p><?= $item['description']; ?></p>
                            <div class="main__row_elem_bottom">
                                <p><?= $item['price']; ?> руб.</p>
                                <div class="cart_elem_delete">
                                    <button type="button" class="delete-btn" data-id="<?= $item['id']; ?>">Удалить</button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="cart_buy_block">
                    <input type="hidden" name="order_summ" value="<?= $total_price; ?>">
                    <input type="hidden" name="cart_items_json" value="<?= htmlspecialchars(json_encode($cart_items, JSON_UNESCAPED_UNICODE)); ?>">
                    <p>Сумма заказа: <span id="total-price"><?= $total_price; ?></span> руб.</p>
                    <button type="submit">Купить</button>
                </div>
            </form>
        </div>
    <?php else: ?>
        <div class="cart_main__container">
            <h1>Корзина</h1>
            <div class="cart_main__img">
                <img src="img/emptyCartIcon 1.svg" alt="">
            </div>
            <p>Тут пусто</p>
        </div>
    <?php endif; ?>
</main>

<script>
document.addEventListener("DOMContentLoaded", function () {
    // Обновление общей суммы
    function updateTotalPrice() {
        const items = document.querySelectorAll('.main__row_elem');
        let total = 0;

        items.forEach(item => {
            const price = parseFloat(item.getAttribute('data-price'));
            if (!isNaN(price)) {
                total += price;
            }
        });

        document.getElementById('total-price').textContent = total.toFixed(2);
        document.querySelector('input[name="order_summ"]').value = total.toFixed(2);
    }

    // Обработка удаления товара
    document.querySelectorAll('.delete-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const itemId = this.getAttribute('data-id');
            const itemElement = document.querySelector(`.main__row_elem[data-id="${itemId}"]`);
            
            fetch('delete_from_cart.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `cart_item_id=${itemId}`
            })
            .then(response => {
                if (response.ok) {
                    itemElement.remove();
                    updateTotalPrice();
                } else {
                    console.error('Ошибка при удалении товара');
                }
            })
            .catch(error => {
                console.error('Ошибка сети:', error);
            });
        });
    });
});
</script>
</body>
</html>
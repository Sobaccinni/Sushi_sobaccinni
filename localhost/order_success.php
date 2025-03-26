<?php
include "components/core.php";
session_start();
include "components/core.php";

// Проверка авторизации
if (!isset($_SESSION['user']['id'])) {
    header("Location: login.php");
    exit();
}

// Получаем ID заказа
$order_id = $_GET['order_id'] ?? 0;
if (!$order_id) {
    die("Не указан ID заказа");
}

// Получаем данные заказа
$sql = "SELECT * FROM orders WHERE id = ? AND user_id = ?";
$stmt = $link->prepare($sql);
$stmt->bind_param("ii", $order_id, $_SESSION['user']['id']);
$stmt->execute();
$result = $stmt->get_result();
$order = $result->fetch_assoc();
$stmt->close();

// Проверяем существование заказа
if (!$order) {
    die("Заказ не найден или вам недоступен");
}

// Декодируем товары с проверкой
$items = [];
if (!empty($order['items_json'])) {
    $items = json_decode($order['items_json'], true);
    
    // Проверка на ошибку декодирования
    if (json_last_error() !== JSON_ERROR_NONE) {
        die("Ошибка при обработке данных заказа");
    }
}
include "components/header2.php";
?>
<main>
    <div class="order-container">
        <h1>Заказ #<?= $order['id'] ?></h1>
        <p>Дата: <?= $order['created_at'] ?></p>
        <p>Сумма: <?= $order['total'] ?> руб.</p>
        <p>Статус: <?= $order['status_id']  ?></p>
        
        <h2>Состав заказа:</h2>
        <?php if (!empty($items)): ?>
            <div class="order-items">
                <?php foreach ($items as $item): ?>
                    <div class="order-item">
                        <img src="<?= htmlspecialchars($item['img'] ?? 'img/no-image.png') ?>" 
                             alt="<?= htmlspecialchars($item['name']) ?>" 
                             class="item-image">
                        <div class="item-info">
                            <h3><?= htmlspecialchars($item['name']) ?></h3>
                            <p>Цена: <?= $item['price'] ?> руб.</p>
                            <p>Вес: <?= $item['weight'] ?? '—' ?> г</p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>Информация о товарах отсутствует</p>
        <?php endif; ?>
    </div>
</main>
<?php
include "components/footer.php";
?>
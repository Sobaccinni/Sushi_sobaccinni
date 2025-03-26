<?php
include "components/core.php";
if(!isset($_SESSION['user'])){
    header("Location:index.php");
    exit();
}

$user_id = $_SESSION['user']['id'];
$orders_check = "SELECT * FROM `orders` WHERE `user_id` = '$user_id' ORDER BY created_at DESC";
$check_res = $link->query($orders_check);

include "components/header2.php";
?>

<main>  
    <div class="container">
        <div class="user_main__top">
            <h1>Личный кабинет</h1>
            <p>Имя: <?= htmlspecialchars($_SESSION['user']['fullname']) ?></p>
            <p>Эл.почта: <?= htmlspecialchars($_SESSION['user']['email']) ?></p>
            <a href="logout.php">Выход</a>
        </div>
        
        <div class="user_main__orders">
            <div class="user_main__orders_top">
                <h2>Ваши заказы</h2>
            </div>
            
            <div class="user_main__orders_elems">
                <?php if ($check_res->num_rows > 0): ?>
                    <?php while ($order = $check_res->fetch_assoc()): ?>
                        <?php
                        // Декодируем товары из JSON
                        $items = json_decode($order['items_json'], true);
                        $order_date = date('d.m.Y', strtotime($order['created_at']));
                        ?>
                        
                        <div class="user_main__orders_elem">
                            <div class="user_orders_elem_info">
                                <p>Дата: <?= $order_date ?></p>
                                <p>Номер заказа: №<?= $order['id'] ?></p>
                                <p>Статус: <?= getStatusText($order['status_id']) ?></p>
                                <p>Сумма заказа: <?= $order['total'] ?>р</p>
                            </div>
                            
                            <div class="user-order-items">
                                <?php if (!empty($items) && is_array($items)): ?>
                                    <?php foreach ($items as $item): ?>
                                        <div class="user-order-item">
                                            <div class="user_main__orders_elem_img">
                                                <img src="<?= htmlspecialchars($item['img'] ?? 'img/no-image.png') ?>" 
                                                     alt="<?= htmlspecialchars($item['name']) ?>">
                                            </div>
                                            <div class="user_main__orders_elem_desc">
                                                <div class="user_main__orders_elem_top">
                                                    <p><?= htmlspecialchars($item['name']) ?></p>
                                                </div>
                                                <div class="user_main__orders_elem_bottom">
                                                    <p><?= $item['price'] ?>р</p>   
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <p>Товары не найдены</p>
                                <?php endif; ?>
                            </div>
                            <hr>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p>У вас пока нет заказов</p>
                <?php endif; ?>
            </div>
        </div>  
    </div>
</main>

<?php
// Функция для получения текста статуса
function getStatusText($status_id) {
    $statuses = [
        1 => 'Новое',
        2 => 'В работе',
        3 => 'Доставлено',
        4 => 'Отменен'
    ];
    return $statuses[$status_id] ?? 'Неизвестный статус';
}

include "components/footer.php";
?>
</body>
</html>
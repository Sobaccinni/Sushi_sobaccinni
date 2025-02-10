<?php

include "../components/core.php";


    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        // Получение данных из формы
        $name = $_POST['name'];
        $desc = $_POST['desc'];
        $weight = $_POST['weight'];
        $price = $_POST['price'];
        $category = $_POST['category'];

        // Обработка загруженного изображения
        if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = '../uploads/'; // Папка для загрузки изображений
            $uploadFile = $uploadDir . basename($_FILES['img']['name']);

            // Проверка на допустимый тип файла
            $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));
            $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
            if (in_array($imageFileType, $allowedTypes)) {
                // Перемещение файла в папку uploads
                if (move_uploaded_file($_FILES['img']['tmp_name'], $uploadFile)) {
                    // Вставка данных в базу данных
                    $sql = "INSERT INTO `product` (`name`, `description`, `weight`, `price`, `img`, `category_id`)
                            VALUES ('$name', '$desc', '$weight', '$price', '$uploadFile', '$category')";

                    if ($link->query($sql) === TRUE) {
                        echo "Товар успешно добавлен.";
                        header("Location:../admin.php");
                    } else {
                        echo "Ошибка: " . $sql . "<br>" . $link->error;
                    }
                } else {
                    echo "Ошибка при загрузке изображения.";
                }
            } else {
                echo "Недопустимый тип файла. Разрешены только JPG, JPEG, PNG и GIF.";
            }
        } else {
            echo "Ошибка при загрузке изображения.";
        }
}
?>
<?php
include "components/core.php";

if($_POST){
    $product_id = $_POST['product_id'];
    $user_id = $_SESSION['user']['id'];
    $sql = "INSERT INTO `cart`(`user_id`, `product_id`) VALUES ('$user_id', '$product_id')";
    $result = $link->query($sql);
    header("Location: index.php#product-" . $product_id);}
?>
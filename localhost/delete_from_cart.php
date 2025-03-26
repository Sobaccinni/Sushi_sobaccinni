<?php
    include "components/core.php";

    if($_POST){
        $id = $_POST['cart_product_id'];
        $sql = "DELETE FROM `cart` WHERE id = '$id'";
        $result = $link->query($sql);
        header("Location:cart.php");    
    }
?>
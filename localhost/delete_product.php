<?php

include "components/core.php";

if($_POST){

    $sql = "DELETE FROM `product` WHERE `id` = '{$_POST['delete_id']}'";
    $result = $link->query($sql);
    
}
header("Location:admin.php");
?>
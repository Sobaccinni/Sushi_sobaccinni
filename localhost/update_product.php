<?php

include "components/core.php";

if($_POST){
    $
    $sql = "UPDATE `product` SET `name`='[value-2]',`description`='[value-3]',`weight`='[value-4]',`price`='[value-5]',`img`='[value-6]' WHERE `id` = '{$_POST['update_id']}'";
    $result = $link->query($sql);
    
}
header("Location:admin.php");
?>
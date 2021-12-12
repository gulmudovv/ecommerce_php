<?php

// Модель для работы с таблицей

// функция сохраненния товара для созданного заказа
function setPurchaseForOrder($orderId, $cart){
   
   


   $link = $GLOBALS["db"];

   
    $sql = "INSERT INTO purchase (`order_id`, `product_id`, `price`, `amount`)
            VALUES ";

    $values = [];   
    foreach($cart as $product){
       $values[]="('{$orderId}', '{$product['id']}', '{$product['price']}', '{$product['cnt']}')";
    }	
    $sql .= implode($values, ', ');
    $rs = mysqli_query($link, $sql);   

    return $rs;
}



function getPurchaseForOrder($orderId){
    
    $link = $GLOBALS["db"];
   
    $sql = "SELECT `pe`.*, `ps`.`name` 
            FROM purchase AS `pe` 
            JOIN products AS `ps` ON `pe`.product_id = `ps`.id 
            WHERE `pe`.order_id = '{$orderId}'";   
    

    $rs = mysqli_query($link, $sql);   

    return createSmartyRsArray($rs);
}
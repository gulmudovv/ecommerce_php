<?php
include_once '../models/PurchaseModel.php';
// Модель для таблицы orders
function makeNewOrder($name, $phone, $address){
   
   $userId = $_SESSION['user']['id'];
   

   $comment = "Id: {$userId}<br>
               Имя: {$name}<br>
               Тел: {$phone}
               Адрес: {$address}";


    $dateCreated = date('Y.m.d H:i:s');
    $userIp = $_SERVER['REMOTE_ADDR'];


   $link = $GLOBALS["db"];
   $sql = "INSERT INTO orders (`user_id`, `date_created`, `date_payment`, `status`, `comment`, `user_ip`)
           VALUES ('{$userId}', '{$dateCreated}', null, '0', '{$comment}', '{$user_Ip}')";
	
	$rs = mysqli_query($link, $sql);


	if($rs){
		$sql = "SELECT id FROM orders ORDER BY id DESC LIMIT 1";

		$rs = mysqli_query($link, $sql);

		$rs = createSmartyRsArray($rs);

		if(isset($rs[0])){
			
			return $rs[0]['id'];
		}

	}

return false;
}


function getOrdersWithProductsByUser($userId){

   $link = $GLOBALS["db"];
   $sql = "SELECT * FROM orders WHERE `user_id` = '{$userId}' ORDER BY id DESC";
    
   $rs = mysqli_query($link, $sql);
   $smartyRs = [];	
	while($row = mysqli_fetch_assoc($rs)){
        $rsChildren = getPurchaseForOrder($row['id']);
        if($rsChildren){
        	$row['children'] = $rsChildren;
		    $smartyRs[] = $row;
		}
	}
	
	//d($smartyRs);

   return $smartyRs;
}
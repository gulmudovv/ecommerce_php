<?php
// Модель для работы с таблицей users
include_once '../models/OrdersModel.php';
//Функция регистрации нового пользователя
function registerNewUser($email, $pwdMD5, $name, $phone, $address){

	$link = $GLOBALS["db"];
    
    
    $email = htmlspecialchars(mysqli_real_escape_string($link, $email));
    $name = htmlspecialchars(mysqli_real_escape_string($link, $name));
    $phone = htmlspecialchars(mysqli_real_escape_string($link, $phone));
    $address = htmlspecialchars(mysqli_real_escape_string($link, $address));

    $sql = "INSERT INTO users (`email`, `pwd`, `name`, `phone`,`address`)
            VALUES ('{$email}', '{$pwdMD5}', '{$name}', '{$phone}','{$address}')";

    $rs = mysqli_query($link, $sql);
    
    if($rs){
    	$sql = "SELECT * FROM users WHERE (`email` = '{$email}' and `pwd` = '{$pwdMD5}') LIMIT 1";
    	
    	$rs = mysqli_query($link, $sql);
    	$rs = createSmartyRsArray($rs);

    	if(isset($rs[0])){
    		$rs['success'] = 1;
    	}else{
    		$rs['success'] = 0;
    	}
    }else{

    	$rs['success'] = 0;
    }

    return $rs;
}


// Проверка параметров для регистрации пользователя
function checkRegisterParams($email, $pwd1, $pwd2){

	$res = null;

	if(!$email){
		$res['success'] = false;
		$res['message'] = 'Введите email';
		return $res;
	}
	if(!$pwd1){
		$res['success'] = false;
		$res['message'] = 'Введите пароль';
		return $res;
	}
	if(!$pwd2){
		$res['success'] = false;
		$res['message'] = 'Введите повтор пароля';
		return $res;
	}
	if($pwd1 != $pwd2){
		$res['success'] = false;
		$res['message'] = 'Пароли не совпадают!';
    }
	return $res;
}
//Функция для проверки  email на наличии в базе данных
function checkUserEmail($email){
    
    $link = $GLOBALS["db"];
    $email = mysqli_real_escape_string($link, $email);
	
	
	$sql = "SELECT * FROM users WHERE `email` = '{$email}'";    	
    $rs = mysqli_query($link, $sql);
    $rs = createSmartyRsArray($rs);
    
    return $rs;
}

function loginUser($email, $pwd){
    
    $link = $GLOBALS["db"];
    $email = mysqli_real_escape_string($link, $email);
    $pwd = md5($pwd);
	
	
	$sql = "SELECT * FROM users WHERE (`email` = '{$email}' AND `pwd` = '{$pwd}') LIMIT 1";    	
    $rs = mysqli_query($link, $sql);
    $rs = createSmartyRsArray($rs);

    if(isset($rs[0])){
    	$rs['success'] = 1;    	
    }else{
    	$rs['success'] = 0;
    }
    
    return $rs;
}

// изменение информации о пользователе
function updateUserData($name, $phone, $address, $pwd1, $pwd2, $curPwd){

    $link = $GLOBALS["db"];
    
    
    $email = htmlspecialchars(mysqli_real_escape_string($link, $_SESSION['user']['email']));
    $name = htmlspecialchars(mysqli_real_escape_string($link, $name));
    $phone = htmlspecialchars(mysqli_real_escape_string($link, $phone));
    $address = htmlspecialchars(mysqli_real_escape_string($link, $address));
    $pwd1 = trim($pwd1);
    $pwd2 = trim($pwd2);

    $newPwd = null;
    if($pwd1 && ($pwd1 == $pwd2)){
        $newPwd = md5($pwd1);
    }
    
    $sql = "UPDATE users SET ";

    if($newPwd){
        $sql .= " `pwd` = '{$newPwd}', ";
    }
    $sql .= "`name` = '{$name}',
            `phone` = '{$phone}',
            `address` = '{$address}' 
            WHERE `email` = '{$email}' AND `pwd` = '{$curPwd}' 
            LIMIT 1";        
  
    $rs = mysqli_query($link, $sql);

    return $rs;
    

}

function getCurUserOrders(){

    $userId = isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : 0;
   

    $rs = getOrdersWithProductsByUser($userId);
 
    return $rs; 
}
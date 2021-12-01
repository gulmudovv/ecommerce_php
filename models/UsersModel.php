<?php
// Модель для работы с таблицей users

//Функция регистрации нового пользователя
function registerNewUser($email, $pwdMD5, $name, $phone, $address){

	$link = $GLOBALS["db"];
    
    
    $email = htmlspecialchars(mysqli_real_escape_string($link, $email));
    $name = htmlspecialchars(mysqli_real_escape_string($link, $name));
    $phone = htmlspecialchars(mysqli_real_escape_string($link, $phone));
    $address = htmlspecialchars(mysqli_real_escape_string($link, $address));

    $sql = "INSERT INTO users (`email`, `pwd`, `name`, `phone`,`adress`)
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
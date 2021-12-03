<?php

//Контроллер функции пользователя

//подключаем модели
include_once '../models/CategoriesModel.php';
include_once '../models/UsersModel.php';

// AJAX регистрация пользователя
function registerAction(){

	$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
	$email = trim($email);

	$pwd1 = isset($_REQUEST['pwd1']) ? $_REQUEST['pwd1'] : null;
	$pwd2 = isset($_REQUEST['pwd2']) ? $_REQUEST['pwd2'] : null;

	$phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : null;
	$address = isset($_REQUEST['address']) ? $_REQUEST['address'] : null;
	$name = isset($_REQUEST['name']) ? $_REQUEST['name'] : null;
    $name = trim($name);

    $resData = null;
    $resData = checkRegisterParams($email, $pwd1, $pwd2);
    
    if(!$resData && checkUserEmail($email)){
    	$resData['success'] = false;
    	$resData['message'] = "Пользователь с таким email-('{$email}') уже зарегистрирован";
    }

    if(!$resData){
    	$pwdMD5 = md5($pwd1);
    	$userData = registerNewUser($email, $pwdMD5, $name, $phone, $address);
    	if($userData['success']){
    		$resData['message'] = 'Пользователь успешно зарегистрирован';
    		$resData['success'] = 1;

    		$userData = $userData[0];
    		$resData['userName'] = $userData['name'] ? $userData['name'] : $userData['email'];
    		$resData['userEmail'] = $email;

    		$_SESSION['user'] = $userData;  
    		$_SESSION['user']['displayName'] = $userData['name'] ? $userData['name'] : $userData['email'];

    	}else{
    		$resData['success'] = 0;
    		$resData['message'] = 'Ошибка регистрации';
    	}
    }

    echo json_encode($resData);

}

// функция logout
function logoutAction(){
	if(isset($_SESSION['user'])){
		unset($_SESSION['user']);
		unset($_SESSION['cart']);

	}
	header('Location: /');
}

// функция авторизации пользователя
function loginAction(){
    $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
	$email = trim($email);

	$pwd = isset($_REQUEST['pwd']) ? $_REQUEST['pwd'] : null;
	$pwd = trim($pwd);

	$userData = loginUser($email, $pwd);

	if($userData['success']){
		$userData = $userData[0];

		$_SESSION['user'] = $userData;
		$_SESSION['user']['displayName'] = $userData['name'] ? $userData['name'] : $userData['email'];

		$resData = $_SESSION['user'];
		$resData['success'] = 1; 
	}else{
		$resData['success'] = 0;
		$resData['message'] = 'Неверный логин или пароль';
	}
    
    echo json_encode($resData);     
}
//action личного кабинета пользователя 
function indexAction($smarty){

    //если пользователь не залогинен то редирект на главную страницу
    if(!isset($_SESSION['user'])){
    	header('Location: /');
    }
    //получить все категории
	$rsCategories = getAllMainCatsWithChildren();




	$smarty->assign('pageTitle', 'Личный кабинет');	
    $smarty->assign('rsCategories', $rsCategories);
    
    

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'user');
    loadTemplate($smarty, 'footer');
}

//Обновление данных пользователя
function updateAction(){
    if(!isset($_SESSION['user'])){
        header('Location: /');
    }
    
    $resData = []; 
    $curPwd = isset($_REQUEST['curPwd']) ? $_REQUEST['curPwd'] : null;
    $pwd1 = isset($_REQUEST['pwd1']) ? $_REQUEST['pwd1'] : null;
    $pwd2 = isset($_REQUEST['pwd2']) ? $_REQUEST['pwd2'] : null;
    $phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : null;
    $address = isset($_REQUEST['address']) ? $_REQUEST['address'] : null;
    $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : null;
    
    $curPwdMD5 = md5($curPwd);
    if(!$curPwd || ($_SESSION['user']['pwd'] != $curPwdMD5)){
        $resData['success'] = 0;
        $resData['message'] = 'Текущий пароль не верный';
        echo json_encode($resData);
        return false;
    }
    

    $res = updateUserData($name, $phone, $address, $pwd1, $pwd2, $curPwdMD5);
    if($res){
        $resData['success'] = 1;
        $resData['message'] = 'Данные сохранены';
        $resData['userName'] = $name;

        $_SESSION['user']['name'] = $name;
        $_SESSION['user']['phone'] = $phone;
        $_SESSION['user']['address'] = $address;
        $newPwd = $_SESSION['user']['pwd'];       
        if($pwd1 && ($pwd1 == $pwd2)){
        $newPwd = md5(trim($pwd1));
        }
        $_SESSION['user']['pwd'] = $newPwd;
        $_SESSION['user']['displayName'] = $name ? $name : $_SESSION['user']['email'];
    }else{
        $resData['success'] = 0;
        $resData['message'] = 'Ошибка  сохранения данных';
 
    }

    echo json_encode($resData);
}
<?php
session_start(); // стартуем сессию

//если в сессии нет массива корзины то создаем ее
if(!isset($_SESSION['cart'])){
	$_SESSION['cart'] = array();
}

include_once '../config/config.php';           // Инициализация настроек
include_once '../config/db.php';              // Настройки соединения с БД
include_once '../library/mainFunctions.php';   //Основные функции

// Определяем с каким контроллером будем работать
$controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) : 'Index';
// Определяем с каким action будем работать
$actionName = isset($_GET['action']) ? ($_GET['action']) : 'index';

// инициализируем переменную количество элементов в корзине
$smarty->assign('cartCntItems', count($_SESSION['cart']));

//вызов функции загрузки страниц
loadPage($smarty, $controllerName, $actionName);
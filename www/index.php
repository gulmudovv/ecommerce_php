<?php
include_once '../config/config.php';           // Инициализация настроек
include_once '../config/db.php';              // Настройки соединения с БД
include_once '../library/mainFunctions.php';   //Основные функции

// Определяем с каким контроллером будем работать
$controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) : 'Index';
// Определяем с каким action будем работать
$actionName = isset($_GET['action']) ? ($_GET['action']) : 'index';

//вызов функции загрузки страниц
loadPage($smarty, $controllerName, $actionName);
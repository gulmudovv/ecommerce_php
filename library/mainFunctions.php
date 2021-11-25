<?php
/*

Основные функции

*/

//функция для загрузки страницы
function loadPage($smarty, $controllerName, $actionName = 'index'){
	
	// Подключаем контроллер
	include_once PathPrefix . $controllerName . PathPostfix;
	// формируем названии функции
    $function = $actionName.'Action';
    //вызываем функцию
    $function($smarty);
}



// функция для загрузки шаблона
function loadTemplate($smarty, $templateName){
    
    $smarty->display($templateName .TemplatePostfix);

}

//функция для дебаггинга
function d($value = null, $die = 1){

	echo 'Debug: <br/><pre>';
	print_r($value);
	echo '</pre>';

	if($die) die();
}
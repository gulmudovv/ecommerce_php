<?php

/*
 Контроллер главной страницы
*/


function indexAction($smarty){
	
    $smarty->assign('pageTitle', 'Главная страница');
    

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'index');
    loadTemplate($smarty, 'footer');
}
<?php

// Контроллер страницы категории


//подключаем модели
include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';

//Функция формирования страницы категории
function indexAction($smarty){
	
	$catId = isset($_GET['id']) ? $_GET['id'] : null;
	if(!$catId) exit();
	
    $rsChildCats=null;
    $rsProducts=null;

	$rsCategory = getCatById($catId);
	
	//если главная категория то показываем дочернии категории, иначе показываем товар
	if($rsCategory['parent_id']==0){
		$rsChildCats = getChildrenForCat($catId);
	}else{
		$rsProducts = getProductsByCat($catId);
	}
    
    $rsCategories = getAllMainCatsWithChildren();

    $smarty->assign('rsCategories', $rsCategories);

    $smarty->assign('pageTitle',  $rsCategory['name']);
    $smarty->assign('rsCategory', $rsCategory);
    $smarty->assign('rsProducts', $rsProducts);
    $smarty->assign('rsChildCats', $rsChildCats);
    

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'category');
    loadTemplate($smarty, 'footer');

}
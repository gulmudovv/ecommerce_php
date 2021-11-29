<?php

// Контроллер страницы товара (/product/id)

//подключаем модели
include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';

//функция формирования страницы продукта
function indexAction($smarty){
	$itemId = isset($_GET['id']) ? $_GET['id'] : null;
	if(!$itemId) exit();
    
	//получить данные продукта
	$rsProduct = getProductById($itemId);
	
	// проверка элемента в корзине на наличие
	$smarty->assign('itemInCart', 0);
	if(in_array($itemId, $_SESSION['cart'])){
		$smarty->assign('itemInCart', 1);
	}
	
	//получить все категории
	$rsCategories = getAllMainCatsWithChildren();

	//d($rsProduct);
	$smarty->assign('pageTitle', $rsProduct['name']);
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProduct', $rsProduct);
    

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'product');
    loadTemplate($smarty, 'footer');
}
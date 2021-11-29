<?php

// Контроллер для работы с корзиной


//подключаем модели
include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';

//функция для добавления товара в корзину
function addtocartAction(){
    
    $itemId = isset($_GET['id']) ? intval($_GET['id']) : null;
    
    if(!$itemId) return false;

    $resData = [];

    // если значение не найдено, то добавляем
    if(isset($_SESSION['cart']) && array_search($itemId, $_SESSION['cart']) === false){
    	$_SESSION['cart'][] = $itemId;

    	$resData['cntItems'] = count($_SESSION['cart']);
    	$resData['success'] = 1;
    }else{
    	$resData['success'] = 0;
    }

    echo json_encode($resData);
}

// функция удаления элементов из корзины
function removefromcartAction(){
     $itemId = isset($_GET['id']) ? intval($_GET['id']) : null;
    
    if(!$itemId) exit();

    $resData = [];
    $key = array_search($itemId, $_SESSION['cart']);
    
    if($key !== false){
        unset($_SESSION['cart'][$key]);
        $resData['success'] = 1;
        $resData['cntItems'] = count($_SESSION['cart']);
    }else{
        $resData['success'] =0;
    }
    
    echo json_encode($resData);
}

//главная страницa корзины
function indexAction($smarty){

    $itemIds = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();

    $rsCategories = getAllMainCatsWithChildren();
    $rsProducts = getProductsFromArray($itemIds);

    $smarty->assign('pageTitle', 'Корзина');
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProducts', $rsProducts);
    

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'cart');
    loadTemplate($smarty, 'footer');
}

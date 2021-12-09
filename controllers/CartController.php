<?php

// Контроллер для работы с корзиной


//подключаем модели
include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';
include_once '../models/OrdersModel.php';
include_once '../models/PurchaseModel.php';

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

//формировании страницы заказа
function orderAction($smarty){
    //получаем массив Id продуктов в корзине

    $itemIds = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
    // если корзина пуста то редирект в корзину
    if(!$itemIds){
        header('Location /cart/');
        return;
    }
    //получаем из массива $_POST кол-во товара в корзине
    $itemsCnt = [];
    foreach($itemIds as $item){
        $postVar = 'itemCnt_' . $item;
        $itemsCnt[$item] = isset($_POST[$postVar]) ? $_POST[$postVar] : null;
    }
     
    $strIds = implode($itemIds, ', ');

    $rsProducts = getProductsFromArray($itemIds);

    $i=0;
    foreach ($rsProducts as &$item) {
        
        $item['cnt'] = isset($itemsCnt[$item['id']]) ? $itemsCnt[$item['id']] : 0;

    if($item['cnt']){    
        $item['realPrice'] = $item['cnt'] * $item['price'];
    }
    else{
        unset($rsProducts[$i]);
    }
    $i++;

    }


    if(!$rsProducts){
        echo "Корзина пуста";
        return;
    }

    // полученный список товаров помещаем в сессионную переменную
    $_SESSION['saleCart'] = $rsProducts;

    $rsCategories = getAllMainCatsWithChildren();

    if(!isset($_SESSION['user'])){
        $smarty->assign('hideLoginBox', 1);
    }


    $smarty->assign('pageTitle', 'Заказ');
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProducts', $rsProducts);
    

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'order');
    loadTemplate($smarty, 'footer');

    
}
// Ajax функция сохранения заказа
function saveorderAction(){

    $cart = isset($_SESSION['saleCart']) ? $_SESSION['saleCart'] : null;

    if(!$cart){
        $resData['success'] = 0;
        $resData['message'] = 'Нет товара для заказа';
        echo json_encode($resData);
        return;
    }

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];


    // создаем новый заказ и получаем его ID
    $orderId = makeNewOrder($name, $phone, $address);


}
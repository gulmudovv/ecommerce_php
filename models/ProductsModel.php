<?php
//Модель для работы с таблицей продуктов

//Функция для получения последне добавленных продуктов
function getlastProducts($limit=null){

	$sql = "SELECT * FROM `products` ORDER BY id DESC";

	if($limit){
		$sql .=" LIMIT {$limit}";
	}
	$link = $GLOBALS["db"];
	$rs = mysqli_query($link, $sql);

	return createSmartyRsArray($rs);

}
// Функция для выборки с БД для категории по Id
function getProductsByCat($itemId){
	
	$itemId = intval($itemId);
	
	$sql = "SELECT * FROM products WHERE category_id = '{$itemId}'";
	$link = $GLOBALS["db"];
	$rs = mysqli_query($link, $sql);
    
    return createSmartyRsArray($rs);
}

// Функция для выборки продукта с id из БД 
function getProductById($itemId){

	$itemId = intval($itemId);
	
	$sql = "SELECT * FROM products WHERE id = '{$itemId}'";
	$link = $GLOBALS["db"];
	$rs = mysqli_query($link, $sql);
    
    return mysqli_fetch_assoc($rs);
}
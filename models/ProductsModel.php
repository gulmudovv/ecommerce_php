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
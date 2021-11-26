<?php
//Модель для работы с таблицей category

// получение дочерних категорий для $catId
function getChildrenForCat($catId){
    $sql = "SELECT * FROM categories WHERE parent_id = '{$catId}'";
    $link = $GLOBALS["db"];
	$rs = mysqli_query($link, $sql);
    
	return createSmartyRsArray($rs);

}

//функция для выборки данных
function getAllMainCatsWithChildren(){


	$sql = 'SELECT * FROM categories WHERE parent_id = 0';
	$link = $GLOBALS["db"];

	$rs = mysqli_query($link, $sql);
    $smartyRs = [];
	while($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)){
        
        $rsChildren = getChildrenForCat($row['id']);
        
		if($rsChildren){
			$row['children'] = $rsChildren;
		}

		$smartyRs[]= $row;
	}
	
	return $smartyRs;
}



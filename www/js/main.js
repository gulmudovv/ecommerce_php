//Функция для добавления товара в корзину
function addToCart(itemId){

	console.log("Js-ADD TO CART-");

	$.ajax({
		type: 'POST',
		async: true,
		url: "/cart/addtocart/" + itemId + '/',
		dataType: 'json',
		success: function(data){
			if(data['success']){
				$('#cartCntItems').html(data['cntItems']);

				$('#addCart_'+itemId).hide();
				$('#removeCart_'+itemId).show();
			}
		},      error: function(request, status, error) {
                console.log("ERROR");
                alert(request.responseText);}
	});
}

//Функция удаления элемента из корзины
function removeFromCart(itemId){
	console.log("JS REMOVE FROM CART");

	$.ajax({
		type: 'POST',
		async: true,
		url: "/cart/removefromcart/" + itemId + '/',
		dataType: 'json',
		success: function(data){
			if(data['success']){
				$('#cartCntItems').html(data['cntItems']);

				$('#addCart_'+ itemId).show();
				$('#removeCart_' + itemId).hide();
			}
		},

	});
}
//Функция подсчета общей суммы товара в корзине
function conversionPrice(itemId){

 var cntItems = $('#itemCnt_'+itemId).val();
 var itemPrice = $('#itemPrice_'+itemId).attr('value');

 var realItemPrice = cntItems * itemPrice;
 $('#itemRealPrice_'+itemId).html(realItemPrice);

}
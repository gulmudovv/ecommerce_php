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


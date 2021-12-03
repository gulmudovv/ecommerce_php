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
//Получение данных с форм
function getData(obj_form){
	var hData = {};
	$('input, textarea, select', obj_form).each(function(){
        if(this.name && this.name !=''){
        	hData[this.name] = this.value;
        	console.log('hData['+this.name+']=' + hData[this.name]);
        } 
	});
	return hData;
}
// Функция регистрации нового пользователя
function registerNewUser(){
    var postData = getData('#registerBox');

	$.ajax({
	type: 'POST',
	async: true,
	url: "/user/register/",
	data: postData,
	dataType: 'json',
	success: function(data){
		if(data['success']){
			alert('Регистрация прошла успешно');

			//>блок в левом столбце
			$('#registerBox').hide();

			$('#userLink').attr('href', '/user/');
			$('#userLink').html(data['userName']);
			$('#userBox').show();
		
            //>Страница заказа
            $('#loginBox').hide();
            $('#btnSaveOrder').show();
		}else{
			alert(data['message']);
		}


		
	},

	});
}
// показывать и скрывать форму регистрации
function showRegisterBox(){

	// if($('#registerBoxHidden').css('display') != 'block'){
	// 	$('#registerBoxHidden').show();
	// }else{
	// 	$('#registerBoxHidden').hide();
	// }

	$('#registerBoxHidden').toggle();
}

function logout(){
    alert("Вы так быстро уходите?");
}

// Функция авторизации пользователя
function login(){
	
    var email = $('#loginEmail').val();
    var pwd = $('#loginPwd').val();

    var postData = "email="+email+"&pwd="+pwd;
    
	$.ajax({
	type: 'POST',
	async: true,
	url: "/user/login/",
	data: postData,
	dataType: 'json',
	success: function(data){
		if(data['success']){
			alert('Welcome, ' + data['displayName']+'!');

			//>блок в левом столбце
			$('#registerBox').hide();
			$('#loginBox').hide();

			$('#userLink').attr('href', '/user/');
			$('#userLink').html(data['displayName']);
			$('#userBox').show();		
            
		}else{
			alert(data['message']);
		}		
	},

	});
}
// Функция для изменения информации пользователя
function updateUserData(){

	var name = $('#newName').val();
    var phone = $('#newPhone').val();
    var address = $('#newAdress').val();
    var pwd1 = $('#newPwd1').val();
    var pwd2 = $('#newPwd2').val();
    var curPwd = $('#curPwd').val();
    
    postData = {
    	'name': name,
    	'phone': phone,
    	'address': address,
    	'pwd1': pwd1,
    	'pwd2': pwd2,
    	'curPwd': curPwd,
    };
    console.log(postData);
	$.ajax({
	type: 'POST',
	async: true,
	url: "/user/update/",
	data: postData,
	dataType: 'json',
	success: function(data){
		if(data['success']){
			$('#userLink').html(data['userName']);
		    alert(data['message']); 	
		}else{
			alert(data['message']);
		}

}

	});
}
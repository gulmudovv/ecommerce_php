{* Личный кабинет пользователя *}

<h2>Личный кабинет - {$arUser['name']}.</h2>
<h3>Ваши регистрационные данные:</h3>
<table border="0">
	<tr>
		<td>Логин (email)</td>
		<td>{$arUser['email']}</td>
	</tr>
	<tr>
		<td>Имя</td>
		<td><input type="text" id="newName" value="{$arUser['name']}"></td>
	</tr>
	<tr>
		<td>Телефон</td>
		<td><input type="text" id="newPhone" value="{$arUser['phone']}"></td>
	</tr>
	<tr>
		<td>Адрес</td>
		<td><textarea id="newAdress">{$arUser['address']}</textarea></td>
	</tr>
    
	<tr>
		<td>Новый пароль</td>
		<td><input type="password" id="newPwd1" value=""></td>
	</tr>

	<tr>
		<td>Повторите пароль</td>
		<td><input type="password" id="newPwd2" value=""></td>
	</tr>

	<tr>
		<td>Введите текущий пароль чтобы сохранить изменения</td>
		<td><input type="password" id="curPwd" value=""></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input type="button"  value="Сохранить изменения" onClick="updateUserData();"></td>
	</tr>


	
</table>
<hr>
<h3>Ваши покупки:</h3>
{if !$rsUserOrders}
У вас пока нет покупок!
{else}
<table border='1' cellpadding="1" cellspacing="1">
    <tr>    		
     	<td>№</td>
     	<td>Действие</td>
     	<td>ID заказа</td>
     	<td>Статус</td>
     	<td>Дата создания</td>
     	<td>Дата оплаты</td>
     	<td>Дополнительная информация</td>
     		
    </tr>
{foreach $rsUserOrders as $order name=orders}
 <tr>    		
     	<td>{$smarty.foreach.orders.iteration}</td>
     	<td><a href="#" id="textForShowProducts_{$order['id']}" onclick="showProducts('{$order['id']}'); return false;">Показать товар</a></td>  		
     	
     	<td>{$order['id']}</td>
     	<td>
     	{if $order['status'] == '1'}
            Оплачено
        {else}
            Неоплачено
        {/if}
     	</td>
     	<td>{$order['date_created']}</td>
     	<td>{$order['date_payment']}&nbsp;</td>
     	<td>{$order['comment']}</td>     		
    </tr>
    <tr class="hideme" id="purchaseForOrderId_{$order['id']}">
    	<td colspan="7">
    	{if $order['children']}
    	<table border="1" cellpadding="1" cellspacing="1" width="100%">
    	<tr>	
    	<td>№</td>
    	<td>ID</td>
    	<td>Название</td>
    	<td>Цена</td>
    	<td>Количество</td>    	
 </tr>
 {foreach $order['children'] as $itemChild name=products}
 <tr>
 	 <td>{$smarty.foreach.products.iteration}</td>
 	 <td>{$itemChild['product_id']}</td>
 	 <td><a href="/product/{$itemChild['product_id']}/">{$itemChild['name']}</a></td>
 	 <td>{$itemChild['price']}</td>
 	 <td>{$itemChild['amount']}</td>
 </tr>

{/foreach}
</table>   
{/if}
</td>
</tr>
{/foreach}
</table>
{/if}
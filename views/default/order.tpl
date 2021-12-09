{* Шаблон заказа *}

<h2>Данные заказа:</h2>


<form id="frmOrder" action="/cart/saveorder/" method="POST">
<table>
	<tr>
		<td>№</td>
		<td>Наименование</td>
		<td>Количество</td>
		<td>Цена</td>
		<td>Сумма</td>		
	</tr>
	{foreach $rsProducts as $item name=products}
	<tr>
		<td>{$smarty.foreach.products.iteration}</td>
		<td><a href="/product/{$item['id']}/">{$item['name']}</a></td>
		<td>
            <span id="itemCnt_{$item['id']}">
            	<input type="hidden" name="itemCnt_{$item['id']}" value="{$item['cnt']}">
            	{$item['cnt']}
            </span>
		</td>
		<td>
			<span id="itemPrice_{$item['id']}">
            	<input type="hidden" name="itemPrice_{$item['id']}" value="{$item['price']}">
            	{$item['price']}
            </span>
        </td>

		<td>
			<span id="itemRealPrice_{$item['id']}">
            	<input type="hidden" name="itemRealPrice_{$item['id']}" value="{$item['realPrice']}">
            	{$item['realPrice']}            	
            </span>
        </td>		
	</tr>
    {/foreach}

</table>

   {if isset($arUser)}
   {$buttonClass = ""}
   <h2>Данные покупателя - {$arUser['name']}</h2>
   <div>
   	{$name = $arUser['name']}
   	{$phone = $arUser['phone']}
   	{$address = $arUser['address']}
   	<table>
   		<tr>
   			<td>Имя*</td>
   			<td><input type="text" id="name" name="name" value="{$name}"></td>
   		</tr>
   		<tr>
   			<td>Тел*</td>
   			<td><input type="text" id="phone" name="phone" value="{$phone}"></td>
   		</tr>
   		<tr>
   			<td>Адрес*</td>
   			<td><textarea type="text" id="address" name="address">{$address}</textarea></td>
   		</tr>
   	</table>
   </div>
   {else}

    <div id="loginBox">
        <div class="menuCaption">Авторизация</div>
        
        <table>
        
        <tr>
            <td>Login</td>	
            <td><input type="text" id="loginEmail" name="loginEmail" value=""/></td>
        </tr>

        <tr>
            <td>Password</td>	
            <td><input type="password" id="loginPwd" name="loginPwd" value=""/></td>
        </tr>
        <tr>
        	<td></td>
            <td><input type="button" onclick="login();" value="Log In"/></td>
        </tr>

        </table>        
    </div>
    <div id="registerBox">
    	<div class="menuCaption">Регистрация нового пользователя</div>
    	email* :
    	<input style="margin-left: 70px"type="text" id="email" name="email" value=""/><br>
    	Password* :
    	<input style="margin-left: 44px"type="password" id="pwd1" name="pwd1" value=""/><br>
    	Password again* :
    	<input style="margin-left: 6px" type="password" id="pwd2" name="pwd2" value=""/><br>


    	Имя* :<input style="margin-left: 81px"type="text" id="name" name="name" value=""/><br>
        Тел* :<input style="margin-left: 86px"type="text" id="phone" name="phone" value=""/><br>
        Адрес* :<textarea style="margin-left: 68px; " id="address" name="address"></textarea><br>
        <input style="margin-left: 127px"type="button" onclick="registerNewUser();" value="Регистрация"/>    	
    </div>
    {$buttonClass="class='hideme'"}
   {/if}
   <input {$buttonClass} type="button" id="btnSaveOrder" value="Оформить заказ" onclick="saveOrder();" />

</form>
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
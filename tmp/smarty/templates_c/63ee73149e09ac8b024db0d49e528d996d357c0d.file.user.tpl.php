<?php /* Smarty version Smarty-3.1.6, created on 2021-12-03 20:44:53
         compiled from "../views/default\user.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15797452861a9ec61309569-24011864%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '63ee73149e09ac8b024db0d49e528d996d357c0d' => 
    array (
      0 => '../views/default\\user.tpl',
      1 => 1638553491,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15797452861a9ec61309569-24011864',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_61a9ec61324ef',
  'variables' => 
  array (
    'arUser' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_61a9ec61324ef')) {function content_61a9ec61324ef($_smarty_tpl) {?>

<h2>Личный кабинет - <?php echo $_smarty_tpl->tpl_vars['arUser']->value['name'];?>
.</h2>
<h3>Ваши регистрационные данные:</h3>
<table border="0">
	<tr>
		<td>Логин (email)</td>
		<td><?php echo $_smarty_tpl->tpl_vars['arUser']->value['email'];?>
</td>
	</tr>
	<tr>
		<td>Имя</td>
		<td><input type="text" id="newName" value="<?php echo $_smarty_tpl->tpl_vars['arUser']->value['name'];?>
"></td>
	</tr>
	<tr>
		<td>Телефон</td>
		<td><input type="text" id="newPhone" value="<?php echo $_smarty_tpl->tpl_vars['arUser']->value['phone'];?>
"></td>
	</tr>
	<tr>
		<td>Адрес</td>
		<td><textarea id="newAdress"><?php echo $_smarty_tpl->tpl_vars['arUser']->value['address'];?>
</textarea></td>
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
<hr><?php }} ?>
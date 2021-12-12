<?php /* Smarty version Smarty-3.1.6, created on 2021-12-11 23:57:58
         compiled from "../views/default\user.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15797452861a9ec61309569-24011864%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '63ee73149e09ac8b024db0d49e528d996d357c0d' => 
    array (
      0 => '../views/default\\user.tpl',
      1 => 1639256276,
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
    'rsUserOrders' => 0,
    'order' => 0,
    'itemChild' => 0,
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
<hr>
<h3>Ваши покупки:</h3>
<?php if (!$_smarty_tpl->tpl_vars['rsUserOrders']->value){?>
У вас пока нет покупок!
<?php }else{ ?>
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
<?php  $_smarty_tpl->tpl_vars['order'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['order']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsUserOrders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['orders']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['order']->key => $_smarty_tpl->tpl_vars['order']->value){
$_smarty_tpl->tpl_vars['order']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['orders']['iteration']++;
?>
 <tr>    		
     	<td><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['orders']['iteration'];?>
</td>
     	<td><a href="#" id="textForShowProducts_<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
" onclick="showProducts('<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
'); return false;">Показать товар</a></td>  		
     	
     	<td><?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
</td>
     	<td>
     	<?php if ($_smarty_tpl->tpl_vars['order']->value['status']=='1'){?>
            Оплачено
        <?php }else{ ?>
            Неоплачено
        <?php }?>
     	</td>
     	<td><?php echo $_smarty_tpl->tpl_vars['order']->value['date_created'];?>
</td>
     	<td><?php echo $_smarty_tpl->tpl_vars['order']->value['date_payment'];?>
&nbsp;</td>
     	<td><?php echo $_smarty_tpl->tpl_vars['order']->value['comment'];?>
</td>     		
    </tr>
    <tr class="hideme" id="purchaseForOrderId_<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
">
    	<td colspan="7">
    	<?php if ($_smarty_tpl->tpl_vars['order']->value['children']){?>
    	<table border="1" cellpadding="1" cellspacing="1" width="100%">
    	<tr>	
    	<td>№</td>
    	<td>ID</td>
    	<td>Название</td>
    	<td>Цена</td>
    	<td>Количество</td>    	
 </tr>
 <?php  $_smarty_tpl->tpl_vars['itemChild'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itemChild']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['order']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['products']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['itemChild']->key => $_smarty_tpl->tpl_vars['itemChild']->value){
$_smarty_tpl->tpl_vars['itemChild']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['products']['iteration']++;
?>
 <tr>
 	 <td><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['products']['iteration'];?>
</td>
 	 <td><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['product_id'];?>
</td>
 	 <td><a href="/product/<?php echo $_smarty_tpl->tpl_vars['itemChild']->value['product_id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['name'];?>
</a></td>
 	 <td><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['price'];?>
</td>
 	 <td><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['amount'];?>
</td>
 </tr>

<?php } ?>
</table>   
<?php }?>
</td>
</tr>
<?php } ?>
</table>
<?php }?><?php }} ?>
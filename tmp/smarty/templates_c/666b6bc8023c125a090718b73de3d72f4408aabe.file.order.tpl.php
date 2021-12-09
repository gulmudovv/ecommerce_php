<?php /* Smarty version Smarty-3.1.6, created on 2021-12-09 22:22:48
         compiled from "../views/default\order.tpl" */ ?>
<?php /*%%SmartyHeaderCode:198931424261acfef9c4def7-07436353%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '666b6bc8023c125a090718b73de3d72f4408aabe' => 
    array (
      0 => '../views/default\\order.tpl',
      1 => 1639077766,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '198931424261acfef9c4def7-07436353',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_61acfef9c925b',
  'variables' => 
  array (
    'rsProducts' => 0,
    'item' => 0,
    'arUser' => 0,
    'name' => 0,
    'phone' => 0,
    'address' => 0,
    'buttonClass' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_61acfef9c925b')) {function content_61acfef9c925b($_smarty_tpl) {?>

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
	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsProducts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['products']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['products']['iteration']++;
?>
	<tr>
		<td><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['products']['iteration'];?>
</td>
		<td><a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a></td>
		<td>
            <span id="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
            	<input type="hidden" name="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['cnt'];?>
">
            	<?php echo $_smarty_tpl->tpl_vars['item']->value['cnt'];?>

            </span>
		</td>
		<td>
			<span id="itemPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
            	<input type="hidden" name="itemPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
">
            	<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>

            </span>
        </td>

		<td>
			<span id="itemRealPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
            	<input type="hidden" name="itemRealPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['realPrice'];?>
">
            	<?php echo $_smarty_tpl->tpl_vars['item']->value['realPrice'];?>
            	
            </span>
        </td>		
	</tr>
    <?php } ?>

</table>

   <?php if (isset($_smarty_tpl->tpl_vars['arUser']->value)){?>
   <?php $_smarty_tpl->tpl_vars['buttonClass'] = new Smarty_variable('', null, 0);?>
   <h2>Данные покупателя - <?php echo $_smarty_tpl->tpl_vars['arUser']->value['name'];?>
</h2>
   <div>
   	<?php $_smarty_tpl->tpl_vars['name'] = new Smarty_variable($_smarty_tpl->tpl_vars['arUser']->value['name'], null, 0);?>
   	<?php $_smarty_tpl->tpl_vars['phone'] = new Smarty_variable($_smarty_tpl->tpl_vars['arUser']->value['phone'], null, 0);?>
   	<?php $_smarty_tpl->tpl_vars['address'] = new Smarty_variable($_smarty_tpl->tpl_vars['arUser']->value['address'], null, 0);?>
   	<table>
   		<tr>
   			<td>Имя*</td>
   			<td><input type="text" id="name" name="name" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
"></td>
   		</tr>
   		<tr>
   			<td>Тел*</td>
   			<td><input type="text" id="phone" name="phone" value="<?php echo $_smarty_tpl->tpl_vars['phone']->value;?>
"></td>
   		</tr>
   		<tr>
   			<td>Адрес*</td>
   			<td><textarea type="text" id="address" name="address"><?php echo $_smarty_tpl->tpl_vars['address']->value;?>
</textarea></td>
   		</tr>
   	</table>
   </div>
   <?php }else{ ?>

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
    <?php $_smarty_tpl->tpl_vars['buttonClass'] = new Smarty_variable("class='hideme'", null, 0);?>
   <?php }?>
   <input <?php echo $_smarty_tpl->tpl_vars['buttonClass']->value;?>
 type="button" id="btnSaveOrder" value="Оформить заказ" onclick="saveOrder();" />

</form><?php }} ?>
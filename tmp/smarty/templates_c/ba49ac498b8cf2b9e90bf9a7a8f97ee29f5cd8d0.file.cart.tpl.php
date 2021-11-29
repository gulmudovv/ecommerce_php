<?php /* Smarty version Smarty-3.1.6, created on 2021-11-27 14:34:39
         compiled from "../views/default\cart.tpl" */ ?>
<?php /*%%SmartyHeaderCode:189832751661a1fae973d8f3-87613593%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ba49ac498b8cf2b9e90bf9a7a8f97ee29f5cd8d0' => 
    array (
      0 => '../views/default\\cart.tpl',
      1 => 1638012877,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '189832751661a1fae973d8f3-87613593',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_61a1fae97f7d3',
  'variables' => 
  array (
    'rsProducts' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_61a1fae97f7d3')) {function content_61a1fae97f7d3($_smarty_tpl) {?>
<h1>Корзина</h1>

<?php if (!$_smarty_tpl->tpl_vars['rsProducts']->value){?>
    В корзине пусто.


<?php }else{ ?>
     <h2> Данные заказа </h2>
     <table>

     	<tr>
     		
     		<td>№</td>
     		<td>Название</td>
     		<td>Кол-во</td>
     		<td>Цена</td>
     		<td>Сумма</td>
     		<td>Действие</td>
     		
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
     		<td><input id="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" type="text" name="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value = "1" onchange="conversionPrice(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
);"/></td>
     		<td>
     			<span id="itemPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
">
     		<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>

                </span>
     	    </td>
     		<td>
     			<span id="itemRealPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
     				<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
     				
     			</span>     				
     		</td>

     		<td>
     			<a id="addCart_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="hideme" title="Востановить элемент"   onclick="addToCart(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
); return false;" href="#" alt="В корзину">Востановить</a>
	   <a id="removeCart_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"  title="Удалить из корзины" onclick="removeFromCart(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
); return false;" href="#" alt="Удалить из корзины">Удалить</a>
     		</td>
     		
     	</tr>
     	<?php } ?>
     </table> 
<?php }?><?php }} ?>
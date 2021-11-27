<?php /* Smarty version Smarty-3.1.6, created on 2021-11-26 23:35:47
         compiled from "../views/default\product.tpl" */ ?>
<?php /*%%SmartyHeaderCode:50929611361a100a51dd020-17879662%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c5df48fe23d6db1928059ffcf8dc8290e0a3146e' => 
    array (
      0 => '../views/default\\product.tpl',
      1 => 1637958934,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '50929611361a100a51dd020-17879662',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_61a100a51fc63',
  'variables' => 
  array (
    'rsProduct' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_61a100a51fc63')) {function content_61a100a51fc63($_smarty_tpl) {?>

<div>
	   <h3><?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['name'];?>
</h3>
	   <img src="/images/products/nf.jpg" width="300"><br>
	   Цена: &#8381;<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['price'];?>

	   <a id="addCart_<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
" onclick="addToCart(<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
); return false;" href="#" alt="В корзину">В корзину</a>
	   
	   <p>Характеристики <br><?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['description'];?>
</p>
	   
  </div><?php }} ?>
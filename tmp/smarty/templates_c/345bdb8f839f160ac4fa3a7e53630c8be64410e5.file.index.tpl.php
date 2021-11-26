<?php /* Smarty version Smarty-3.1.6, created on 2021-11-25 23:05:22
         compiled from "../views/default\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:228341674619e839860f0b6-06450272%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '345bdb8f839f160ac4fa3a7e53630c8be64410e5' => 
    array (
      0 => '../views/default\\index.tpl',
      1 => 1637870672,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '228341674619e839860f0b6-06450272',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_619e839863c70',
  'variables' => 
  array (
    'rsProducts' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_619e839863c70')) {function content_619e839863c70($_smarty_tpl) {?>

<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsProducts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['products']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['products']['iteration']++;
?>
  <div style="float: left; padding: 0px 30px 40px 0px;">
	   <a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><img src="/images/products/nf.jpg" width="110"></a><br>
	   <a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>
  </div>
   <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['products']['iteration']%4==0){?>
        <div style="clear:both;"></div>
   <?php }?>
<?php } ?>

 





<?php }} ?>
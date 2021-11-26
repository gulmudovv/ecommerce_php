<?php /* Smarty version Smarty-3.1.6, created on 2021-11-25 23:06:27
         compiled from "../views/default\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1283436313619e902cdf9e01-38537093%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9797888b337e03f99b06385b60a372bbb52d5e02' => 
    array (
      0 => '../views/default\\header.tpl',
      1 => 1637870785,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1283436313619e902cdf9e01-38537093',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_619e902ce5617',
  'variables' => 
  array (
    'pageTitle' => 0,
    'templateWebPath' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_619e902ce5617')) {function content_619e902ce5617($_smarty_tpl) {?><html>
	<head>
		<title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
css/main.css" type="text/css" />
	</head>

	<body>	
      <div id="header">
		<h2>Интернет магазин</h2>
   
      </div>

<?php echo $_smarty_tpl->getSubTemplate ('leftcolumn.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


      
<div id="centerColumn">

	<?php }} ?>
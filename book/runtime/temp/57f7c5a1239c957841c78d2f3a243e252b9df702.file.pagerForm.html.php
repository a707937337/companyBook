<?php /* Smarty version Smarty-3.1.14, created on 2013-09-25 15:42:52
         compiled from "G:\web\wamp\www\book\demo\book\view\default\common\pagerForm.html" */ ?>
<?php /*%%SmartyHeaderCode:303825242858d2eeb96-48413194%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '57f7c5a1239c957841c78d2f3a243e252b9df702' => 
    array (
      0 => 'G:\\web\\wamp\\www\\book\\demo\\book\\view\\default\\common\\pagerForm.html',
      1 => 1380094954,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '303825242858d2eeb96-48413194',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5242858d2f0963_64908530',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5242858d2f0963_64908530')) {function content_5242858d2f0963_64908530($_smarty_tpl) {?><form id="pagerForm" action="<?php echo @constant('NOW_URL');?>
" method="post">
	<input type="hidden" name="pageNum" value="1"/>
	<input type="hidden" name="orderField" value="<?php if (isset($_POST['orderField'])){?><?php echo $_POST['orderField'];?>
<?php }?>"/>
	<input type="hidden" name="orderDirection" value="<?php if (isset($_POST['orderDirection'])){?><?php echo $_POST['orderDirection'];?>
<?php }?>"/>
</form>
<?php }} ?>
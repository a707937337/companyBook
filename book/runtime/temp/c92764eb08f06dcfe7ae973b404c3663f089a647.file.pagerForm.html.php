<?php /* Smarty version Smarty-3.1.14, created on 2013-09-28 12:31:23
         compiled from "E:\wampserver\wamp2\www\book\demo\book\view\default\common\pagerForm.html" */ ?>
<?php /*%%SmartyHeaderCode:3258652465b9b16a4e0-53033347%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c92764eb08f06dcfe7ae973b404c3663f089a647' => 
    array (
      0 => 'E:\\wampserver\\wamp2\\www\\book\\demo\\book\\view\\default\\common\\pagerForm.html',
      1 => 1380094956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3258652465b9b16a4e0-53033347',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52465b9b1dc0e9_69794946',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52465b9b1dc0e9_69794946')) {function content_52465b9b1dc0e9_69794946($_smarty_tpl) {?><form id="pagerForm" action="<?php echo @constant('NOW_URL');?>
" method="post">
	<input type="hidden" name="pageNum" value="1"/>
	<input type="hidden" name="orderField" value="<?php if (isset($_POST['orderField'])){?><?php echo $_POST['orderField'];?>
<?php }?>"/>
	<input type="hidden" name="orderDirection" value="<?php if (isset($_POST['orderDirection'])){?><?php echo $_POST['orderDirection'];?>
<?php }?>"/>
</form>
<?php }} ?>
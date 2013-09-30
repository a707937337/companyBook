<?php /* Smarty version Smarty-3.1.14, created on 2013-09-29 23:38:36
         compiled from "E:\wampserver\wamp2\www\book\book\view\default\common\pagerForm.html" */ ?>
<?php /*%%SmartyHeaderCode:147705248497c041193-31976236%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8e942c45c0368e2a1930b904bcb1d13e79b2c289' => 
    array (
      0 => 'E:\\wampserver\\wamp2\\www\\book\\book\\view\\default\\common\\pagerForm.html',
      1 => 1380094956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '147705248497c041193-31976236',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5248497c0c3ab1_12035474',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5248497c0c3ab1_12035474')) {function content_5248497c0c3ab1_12035474($_smarty_tpl) {?><form id="pagerForm" action="<?php echo @constant('NOW_URL');?>
" method="post">
	<input type="hidden" name="pageNum" value="1"/>
	<input type="hidden" name="orderField" value="<?php if (isset($_POST['orderField'])){?><?php echo $_POST['orderField'];?>
<?php }?>"/>
	<input type="hidden" name="orderDirection" value="<?php if (isset($_POST['orderDirection'])){?><?php echo $_POST['orderDirection'];?>
<?php }?>"/>
</form>
<?php }} ?>
<?php /* Smarty version Smarty-3.1.14, created on 2013-09-28 20:32:47
         compiled from "E:\wampserver\wamp2\www\book\demo\book\view\default\fast\save.html" */ ?>
<?php /*%%SmartyHeaderCode:41895246c83d443454-09359561%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '727d7d8f21afb7af1a229e04472da6c08c24a13c' => 
    array (
      0 => 'E:\\wampserver\\wamp2\\www\\book\\demo\\book\\view\\default\\fast\\save.html',
      1 => 1380371563,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '41895246c83d443454-09359561',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5246c83d4a9852_35581903',
  'variables' => 
  array (
    'restaurant' => 0,
    'item' => 0,
    'cat' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5246c83d4a9852_35581903')) {function content_5246c83d4a9852_35581903($_smarty_tpl) {?><div class="pageContent">
<form method="post" action="<?php echo @constant('SITE_URL');?>
index.php/fast/save" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone)">

<div class="pageFormContent" layoutH="58">
<div class="unit">
  <label>菜名：</label><input type="text" class="required"   name="name" value="">
 </div>
  <div class="unit">
    <label>价格：</label><input type="text" class="required"   name="price" value="">  元
 </div>
 <div class="unit">
    <label>餐馆：</label>
	 <select   name="restaurant_id">
	 <option value="">请选择</option>
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['restaurant']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
			<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</option>
		<?php } ?>


	
	</select>
	
	
 </div>
 <div class="unit">
    <label>分类：</label>
	<select   name="cat_id">
	<option value="">请选择</option>
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cat']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
			<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</option>
		<?php } ?>


	
	</select>
	
 </div>
</div>
<div class="formBar">
<ul>
 <li>
  <div class="buttonActive"><div class="buttonContent"><button type="submit">提交</button></div></div>
</li>
<li>
   <div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div>
   </li></ul></div></form></div><?php }} ?>
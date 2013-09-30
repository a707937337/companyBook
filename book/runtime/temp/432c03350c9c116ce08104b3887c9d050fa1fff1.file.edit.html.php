<?php /* Smarty version Smarty-3.1.14, created on 2013-09-28 21:04:15
         compiled from "E:\wampserver\wamp2\www\book\demo\book\view\default\fast\edit.html" */ ?>
<?php /*%%SmartyHeaderCode:243475246d33768c569-70824544%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '432c03350c9c116ce08104b3887c9d050fa1fff1' => 
    array (
      0 => 'E:\\wampserver\\wamp2\\www\\book\\demo\\book\\view\\default\\fast\\edit.html',
      1 => 1380373449,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '243475246d33768c569-70824544',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5246d337766df3_95292933',
  'variables' => 
  array (
    'data' => 0,
    'restaurant' => 0,
    'item' => 0,
    'cat' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5246d337766df3_95292933')) {function content_5246d337766df3_95292933($_smarty_tpl) {?><div class="pageContent">
<form method="post" action="<?php echo @constant('SITE_URL');?>
index.php/fast/edit" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone)">
<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
" />
<div class="pageFormContent" layoutH="58">
<div class="unit">
  <label>菜名：</label><input type="text" class="required"   name="name" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
">
 </div>
  <div class="unit">
    <label>价格：</label><input type="text" class="required"   name="price" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['price'];?>
">  元
 </div>
 <div class="unit">
    <label>餐馆：</label>
	 <select   name="restaurant_id">
	
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['restaurant']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
			<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['id']==$_smarty_tpl->tpl_vars['data']->value['restaurant_id']){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</option>
		<?php } ?>


	
	</select>
	
	
 </div>
 <div class="unit">
    <label>分类：</label>
	<select   name="cat_id">
	
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cat']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
			<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['id']==$_smarty_tpl->tpl_vars['data']->value['cat_id']){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
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
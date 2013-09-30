<?php /* Smarty version Smarty-3.1.14, created on 2013-09-28 22:22:31
         compiled from "E:\wampserver\wamp2\www\book\demo\book\view\default\book\save.html" */ ?>
<?php /*%%SmartyHeaderCode:107655246de6b4d21b8-23854426%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '10f5bddc9d38afc17e3118e945d08a1128694346' => 
    array (
      0 => 'E:\\wampserver\\wamp2\\www\\book\\demo\\book\\view\\default\\book\\save.html',
      1 => 1380378148,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '107655246de6b4d21b8-23854426',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5246de6b68ee76_88736723',
  'variables' => 
  array (
    'fast' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5246de6b68ee76_88736723')) {function content_5246de6b68ee76_88736723($_smarty_tpl) {?><div class="pageContent">
<form method="post" action="<?php echo @constant('SITE_URL');?>
index.php/book/save" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone)">
<input type="hidden" name="fast_id" value="<?php echo $_smarty_tpl->tpl_vars['fast']->value['id'];?>
">
<div class="pageFormContent" layoutH="58">
<div class="unit">
  <label>菜名：</label><span><?php echo $_smarty_tpl->tpl_vars['fast']->value['name'];?>
</span>
 </div>
  <div class="unit">
    <label>价格：</label><span><?php echo $_smarty_tpl->tpl_vars['fast']->value['price'];?>
</span>  元
 </div>
 <div class="unit">
    <label>餐馆：</label>
	<span><?php echo $_smarty_tpl->tpl_vars['fast']->value['restaurant_id'];?>
</span>
	
	
	
 </div>
 <div class="unit">
	<label>分类：</label>
   <span><?php echo $_smarty_tpl->tpl_vars['fast']->value['cat_id'];?>
</span>
	
	
	
 </div>
 <div class="unit">
	<label>备注：</label>
   <textarea cols="50" rows="5" name="note">
	  
   
   </textarea>
	
	
	
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
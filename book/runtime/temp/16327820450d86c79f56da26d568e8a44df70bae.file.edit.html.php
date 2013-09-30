<?php /* Smarty version Smarty-3.1.14, created on 2013-09-28 13:44:37
         compiled from "E:\wampserver\wamp2\www\book\demo\book\view\default\restaurant\edit.html" */ ?>
<?php /*%%SmartyHeaderCode:2189052466cb398fc07-68841786%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '16327820450d86c79f56da26d568e8a44df70bae' => 
    array (
      0 => 'E:\\wampserver\\wamp2\\www\\book\\demo\\book\\view\\default\\restaurant\\edit.html',
      1 => 1380347074,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2189052466cb398fc07-68841786',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52466cb3a3a2e6_27169120',
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52466cb3a3a2e6_27169120')) {function content_52466cb3a3a2e6_27169120($_smarty_tpl) {?><div class="pageContent">
<form method="post" action="<?php echo @constant('SITE_URL');?>
index.php/restaurant/edit" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone)">
<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
" />
<div class="pageFormContent" layoutH="58">
<div class="unit">
  <label>餐馆名称：</label><input type="text" class="required"   name="name" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
">
 </div>
 
 <div class="unit">
    <label>地址：</label><input type="text" class="required"   name="address" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['address'];?>
">
 </div>
 <div class="unit">
    <label>电话：</label><input type="text" class="required"   name="tel" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['tel'];?>
">
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
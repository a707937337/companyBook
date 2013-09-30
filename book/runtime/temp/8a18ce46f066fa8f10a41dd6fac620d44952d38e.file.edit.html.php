<?php /* Smarty version Smarty-3.1.14, created on 2013-09-25 17:10:20
         compiled from "G:\web\wamp\www\book\demo\book\view\default\cat\edit.html" */ ?>
<?php /*%%SmartyHeaderCode:206755241492c20cbe7-15725467%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8a18ce46f066fa8f10a41dd6fac620d44952d38e' => 
    array (
      0 => 'G:\\web\\wamp\\www\\book\\demo\\book\\view\\default\\cat\\edit.html',
      1 => 1380100213,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '206755241492c20cbe7-15725467',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5241492c2322a6_65875648',
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5241492c2322a6_65875648')) {function content_5241492c2322a6_65875648($_smarty_tpl) {?><div class="pageContent">
<form method="post" action="<?php echo @constant('SITE_URL');?>
index.php/cat/edit" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone)">
<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
" />
<div class="pageFormContent" layoutH="58">
<div class="unit">
  <label>分类名称：</label><input type="text" class="required"   name="name" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
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
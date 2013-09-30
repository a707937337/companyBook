<?php /* Smarty version Smarty-3.1.14, created on 2013-09-28 13:26:05
         compiled from "E:\wampserver\wamp2\www\book\demo\book\view\default\cat\save.html" */ ?>
<?php /*%%SmartyHeaderCode:122165246686dd6fa28-30125917%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a6398238c77d65301154a5d0ba0a44a3be8e51c4' => 
    array (
      0 => 'E:\\wampserver\\wamp2\\www\\book\\demo\\book\\view\\default\\cat\\save.html',
      1 => 1380016450,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '122165246686dd6fa28-30125917',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5246686de39fe8_79762981',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5246686de39fe8_79762981')) {function content_5246686de39fe8_79762981($_smarty_tpl) {?><div class="pageContent">
<form method="post" action="<?php echo @constant('SITE_URL');?>
index.php/cat/save" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone)">

<div class="pageFormContent" layoutH="58">
<div class="unit">
  <label>分类名称：</label><input type="text" class="required"   name="name" value="">
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
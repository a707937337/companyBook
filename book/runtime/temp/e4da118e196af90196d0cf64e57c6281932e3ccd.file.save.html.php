<?php /* Smarty version Smarty-3.1.14, created on 2013-09-28 13:46:16
         compiled from "E:\wampserver\wamp2\www\book\demo\book\view\default\restaurant\save.html" */ ?>
<?php /*%%SmartyHeaderCode:2376052466cf04795f8-63280371%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e4da118e196af90196d0cf64e57c6281932e3ccd' => 
    array (
      0 => 'E:\\wampserver\\wamp2\\www\\book\\demo\\book\\view\\default\\restaurant\\save.html',
      1 => 1380347171,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2376052466cf04795f8-63280371',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52466cf04e7138_80181997',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52466cf04e7138_80181997')) {function content_52466cf04e7138_80181997($_smarty_tpl) {?><div class="pageContent">
<form method="post" action="<?php echo @constant('SITE_URL');?>
index.php/restaurant/save" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone)">

<div class="pageFormContent" layoutH="58">
<div class="unit">
  <label>餐馆名称：</label><input type="text" class="required"   name="name" value="">
 </div>
 
 <div class="unit">
    <label>地址：</label><input type="text" class="required"   name="address" value="">
 </div>
 <div class="unit">
    <label>电话：</label><input type="text" class="required"   name="tel" value="">
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
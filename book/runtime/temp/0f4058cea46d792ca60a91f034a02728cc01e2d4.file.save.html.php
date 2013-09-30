<?php /* Smarty version Smarty-3.1.14, created on 2013-09-26 10:24:37
         compiled from "G:\web\wamp\www\book\demo\book\view\default\user\save.html" */ ?>
<?php /*%%SmartyHeaderCode:201065242b07736a8e4-60318471%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0f4058cea46d792ca60a91f034a02728cc01e2d4' => 
    array (
      0 => 'G:\\web\\wamp\\www\\book\\demo\\book\\view\\default\\user\\save.html',
      1 => 1380161183,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '201065242b07736a8e4-60318471',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5242b07739d015_74866144',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5242b07739d015_74866144')) {function content_5242b07739d015_74866144($_smarty_tpl) {?><div class="pageContent">
<form method="post" action="<?php echo @constant('SITE_URL');?>
index.php/user/save" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone)">
<div class="pageFormContent" layoutH="58">
<div class="unit">
  <label>姓名：</label><input type="text" class="required"   name="name" value="">
 </div>
 <div class="unit">
  <label>部门：</label><input type="text" class="required"   name="department_id" value="">
 </div>
 <div class="unit">
  <label>qq：</label><input type="text" class="required"   name="qq" value="">
 </div>
 <div class="unit">
  <label>tel：</label><input type="text" class="required"   name="tel" value="">
 </div>
 <div class="unit">
  <label>角色：</label><input type="text" class="required"   name="role_id" value="">
 </div>
 <div class="unit">
  <label>密码：</label><input type="password" class="required"     name="password" value="">  
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
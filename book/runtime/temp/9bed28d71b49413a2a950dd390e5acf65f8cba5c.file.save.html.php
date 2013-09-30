<?php /* Smarty version Smarty-3.1.14, created on 2013-09-28 12:37:45
         compiled from "E:\wampserver\wamp2\www\book\demo\book\view\default\user\save.html" */ ?>
<?php /*%%SmartyHeaderCode:2563052465ca1bdc1c4-15543093%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9bed28d71b49413a2a950dd390e5acf65f8cba5c' => 
    array (
      0 => 'E:\\wampserver\\wamp2\\www\\book\\demo\\book\\view\\default\\user\\save.html',
      1 => 1380343061,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2563052465ca1bdc1c4-15543093',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52465ca1d2a8e0_38810306',
  'variables' => 
  array (
    'dep' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52465ca1d2a8e0_38810306')) {function content_52465ca1d2a8e0_38810306($_smarty_tpl) {?><div class="pageContent">
<form method="post" action="<?php echo @constant('SITE_URL');?>
index.php/user/save" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone)">
<div class="pageFormContent" layoutH="58">
<div class="unit">
  <label>姓名：</label><input type="text" class="required"   name="name" value="">
 </div>
<div class="unit">
  <label>上级部门：</label>
  <select class="combox"  name="department_id">
  	<?php echo $_smarty_tpl->tpl_vars['dep']->value;?>

  </select>
 </div>
 <div class="unit">
  <label>qq：</label><input type="text" class="required"   name="qq" value="">
 </div>
 <div class="unit">
  <label>tel：</label><input type="text" class="required"   name="tel" value="">
 </div>
 <div class="unit">
  <label>角色：</label>
  <select class="combox"  name="role_id">
	<option value="">请选择</option>
  	<option value="2">管理员</option>
  	<option value="1">普通会员</option>
  </select>
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
<?php /* Smarty version Smarty-3.1.14, created on 2013-09-26 12:26:31
         compiled from "G:\web\wamp\www\book\demo\book\view\default\user\edit.html" */ ?>
<?php /*%%SmartyHeaderCode:250525242ac16a986b4-05011389%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd518049cf704450274a558e5b428ba2f0c375e48' => 
    array (
      0 => 'G:\\web\\wamp\\www\\book\\demo\\book\\view\\default\\user\\edit.html',
      1 => 1380169588,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '250525242ac16a986b4-05011389',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5242ac16ae2db2_78435356',
  'variables' => 
  array (
    'data' => 0,
    'dep' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5242ac16ae2db2_78435356')) {function content_5242ac16ae2db2_78435356($_smarty_tpl) {?><div class="pageContent">
<form method="post" action="<?php echo @constant('SITE_URL');?>
index.php/user/edit" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone)">
<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
" />
<div class="pageFormContent" layoutH="58">
<div class="unit">
  <label>姓名：</label><input type="text" class="required"   name="name" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
">
 </div>
 <div class="unit">
  <label>部门：</label>
  <select class="combox"  name="department_id">
  	<?php echo $_smarty_tpl->tpl_vars['dep']->value;?>

  </select>
 </div>
 <div class="unit">
  <label>qq：</label><input type="text" class="required"   name="qq" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['qq'];?>
">
 </div>
 <div class="unit">
  <label>tel：</label><input type="text" class="required"   name="tel" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['tel'];?>
">
 </div>
 <div class="unit">
  <label>角色：</label>
  <select class="combox"  name="role_id">
  	<option value="2" <?php if ($_smarty_tpl->tpl_vars['data']->value['role_id']==2){?> select="selected" <?php }?>>管理员</option>
  	<option value="1" <?php if ($_smarty_tpl->tpl_vars['data']->value['role_id']==1){?> select="selected" <?php }?>>普通会员</option>
  </select>
 </div>
 <div class="unit">
  <label>密码：</label><input type="password"    name="password" value="">   <span> 密码不修改请留空 </span>
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
<?php /* Smarty version Smarty-3.1.14, created on 2013-09-29 01:48:31
         compiled from "E:\wampserver\wamp2\www\book\demo\book\view\default\user\edit.html" */ ?>
<?php /*%%SmartyHeaderCode:1300452465d9cc2bec7-20975502%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '69ede08ee77ce06dbaabcfd9a8695c2aeb6fbef1' => 
    array (
      0 => 'E:\\wampserver\\wamp2\\www\\book\\demo\\book\\view\\default\\user\\edit.html',
      1 => 1380390506,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1300452465d9cc2bec7-20975502',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52465d9cd15e55_98863873',
  'variables' => 
  array (
    'data' => 0,
    'dep' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52465d9cd15e55_98863873')) {function content_52465d9cd15e55_98863873($_smarty_tpl) {?><div class="pageContent">
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
  <?php if ($_smarty_tpl->tpl_vars['user']->value['role_id']==2){?>
  <select class="combox"  name="role_id">
	<option <?php if ($_smarty_tpl->tpl_vars['data']->value['role_id']==1){?> selected="selected" <?php }?>  value="1">普通会员</option>
  	<option <?php if ($_smarty_tpl->tpl_vars['data']->value['role_id']==2){?> selected="selected" <?php }?>  value="2" >管理员</option>
  	
  </select>
  <?php }else{ ?>
	<input type="text"  disabled="disabled"  value="普通会员"/>   <input type="hidden"    name="role_id" value="1">
  <?php }?>
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
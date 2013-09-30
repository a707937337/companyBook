<?php /* Smarty version Smarty-3.1.14, created on 2013-09-28 13:19:11
         compiled from "E:\wampserver\wamp2\www\book\demo\book\view\default\department\edit.html" */ ?>
<?php /*%%SmartyHeaderCode:30997524662708fb001-93271658%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7e714563ec791c7c60a0147869ba5e9d371c4ee7' => 
    array (
      0 => 'E:\\wampserver\\wamp2\\www\\book\\demo\\book\\view\\default\\department\\edit.html',
      1 => 1380345547,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30997524662708fb001-93271658',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5246627096a063_61920088',
  'variables' => 
  array (
    'data' => 0,
    'dep' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5246627096a063_61920088')) {function content_5246627096a063_61920088($_smarty_tpl) {?><div class="pageContent">
<form method="post" action="<?php echo @constant('SITE_URL');?>
index.php/department/edit" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone)">
<input type="hidden" class="required"   name="id" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
">
<div class="pageFormContent" layoutH="58">
<div class="unit">
  <label>上级部门：</label>
  <select class="combox"  name="pid">
  	<?php echo $_smarty_tpl->tpl_vars['dep']->value;?>

  </select>
 </div>
<div class="unit">
   <label>部门名称：</label><input type="text" class="required"   name="name" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
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
<?php /* Smarty version Smarty-3.1.14, created on 2013-09-26 15:44:46
         compiled from "G:\web\wamp\www\book\demo\book\view\default\department\save.html" */ ?>
<?php /*%%SmartyHeaderCode:128875243e4aaed1b78-41640683%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b3714e8be4cfc7e7c411a55dd42f98b91cc7874a' => 
    array (
      0 => 'G:\\web\\wamp\\www\\book\\demo\\book\\view\\default\\department\\save.html',
      1 => 1380181452,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '128875243e4aaed1b78-41640683',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5243e4aaf0b528_97697946',
  'variables' => 
  array (
    'dep' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5243e4aaf0b528_97697946')) {function content_5243e4aaf0b528_97697946($_smarty_tpl) {?><div class="pageContent">
<form method="post" action="<?php echo @constant('SITE_URL');?>
index.php/department/save" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone)">

<div class="pageFormContent" layoutH="58">
<div class="unit">
  <label>上级部门：</label>
  <select class="combox"  name="pid">
  	<?php echo $_smarty_tpl->tpl_vars['dep']->value;?>

  </select>
 </div>
<div class="unit">
   <label>部门名称：</label><input type="text" class="required"   name="name" value="">
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
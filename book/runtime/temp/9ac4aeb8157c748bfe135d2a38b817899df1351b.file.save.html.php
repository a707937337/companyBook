<?php /* Smarty version Smarty-3.1.14, created on 2013-09-28 12:56:52
         compiled from "E:\wampserver\wamp2\www\book\demo\book\view\default\department\save.html" */ ?>
<?php /*%%SmartyHeaderCode:2834752466194789366-67166262%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9ac4aeb8157c748bfe135d2a38b817899df1351b' => 
    array (
      0 => 'E:\\wampserver\\wamp2\\www\\book\\demo\\book\\view\\default\\department\\save.html',
      1 => 1380181454,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2834752466194789366-67166262',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dep' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52466194ac9390_28437031',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52466194ac9390_28437031')) {function content_52466194ac9390_28437031($_smarty_tpl) {?><div class="pageContent">
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
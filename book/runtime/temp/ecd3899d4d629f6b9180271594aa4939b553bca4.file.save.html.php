<?php /* Smarty version Smarty-3.1.14, created on 2013-09-24 17:54:13
         compiled from "G:\web\wamp\www\book\demo\book\view\default\cat\save.html" */ ?>
<?php /*%%SmartyHeaderCode:2846952416145b05c49-55497512%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ecd3899d4d629f6b9180271594aa4939b553bca4' => 
    array (
      0 => 'G:\\web\\wamp\\www\\book\\demo\\book\\view\\default\\cat\\save.html',
      1 => 1380016449,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2846952416145b05c49-55497512',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52416145b3e180_64274478',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52416145b3e180_64274478')) {function content_52416145b3e180_64274478($_smarty_tpl) {?><div class="pageContent">
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
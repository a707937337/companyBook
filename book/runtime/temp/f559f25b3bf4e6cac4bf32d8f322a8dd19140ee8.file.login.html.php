<?php /* Smarty version Smarty-3.1.14, created on 2013-09-25 17:37:38
         compiled from "G:\web\wamp\www\book\demo\book\view\default\public\login.html" */ ?>
<?php /*%%SmartyHeaderCode:28955524001f83ae2e3-91229881%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f559f25b3bf4e6cac4bf32d8f322a8dd19140ee8' => 
    array (
      0 => 'G:\\web\\wamp\\www\\book\\demo\\book\\view\\default\\public\\login.html',
      1 => 1380091437,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28955524001f83ae2e3-91229881',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_524001f83e5e34_79864078',
  'variables' => 
  array (
    'msg' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_524001f83e5e34_79864078')) {function content_524001f83e5e34_79864078($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>公司内部订餐系统</title>
</head>
<body>
<p style="color:red;<?php if ($_smarty_tpl->tpl_vars['msg']->value){?>display:block<?php }else{ ?>display:none<?php }?>" ><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</p>
<form method="post">
	<p>姓 名：<input type="text" name="name" value="<?php if (isset($_POST['name'])){?><?php echo $_POST['name'];?>
<?php }?>"></p>
	<p>密 码：<input type="password" name="password" value="<?php if (isset($_POST['name'])){?><?php echo $_POST['password'];?>
<?php }?>"></p>
	<p><input type="submit" value="登陆"></p>
</form>
</body>
</html><?php }} ?>
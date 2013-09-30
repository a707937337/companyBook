<?php /* Smarty version Smarty-3.1.14, created on 2013-09-29 23:09:03
         compiled from "E:\wampserver\wamp2\www\book\demo\book\view\default\install\index.html" */ ?>
<?php /*%%SmartyHeaderCode:2960652483258dd0366-73388262%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e351fdd2ce7a999c3bc04ab98bfe26f15a040a9e' => 
    array (
      0 => 'E:\\wampserver\\wamp2\\www\\book\\demo\\book\\view\\default\\install\\index.html',
      1 => 1380466592,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2960652483258dd0366-73388262',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52483258e1cb86_35279164',
  'variables' => 
  array (
    'msg' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52483258e1cb86_35279164')) {function content_52483258e1cb86_35279164($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>公司订餐系统安装程序</title>
</head>
<body>
<p style="color:red;<?php if ($_smarty_tpl->tpl_vars['msg']->value){?>display:block<?php }else{ ?>display:none<?php }?>" ><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</p>
<form method="post">
 <h4>1、填写配置信息</h4>
 <p>数据库地址：<input type="text" name="dbhost" value="<?php if (isset($_POST['dbhost'])){?><?php echo $_POST['dbhost'];?>
<?php }else{ ?>localhost<?php }?>"></p>
 <p>数 据 库名：<input type="text" name="dbname" value="<?php if (isset($_POST['dbname'])){?><?php echo $_POST['dbname'];?>
<?php }?>"></p>
 <p>数据库用户：<input type="text" name="dbuser" value="<?php if (isset($_POST['dbuser'])){?><?php echo $_POST['dbuser'];?>
<?php }else{ ?>root<?php }?>"></p>
 <p>数据库密码：<input type="text" name="dbpassword" value="<?php if (isset($_POST['dbpassword'])){?><?php echo $_POST['dbpassword'];?>
<?php }?>"></p>
 <p>数据表前缀：<input type="text" name="pre" value="<?php if (isset($_POST['pre'])){?><?php echo $_POST['pre'];?>
<?php }else{ ?>book_<?php }?>"></p>
 
  <h4>2、填写管理员信息</h4>
  <p>所在部 门 ：<input type="text" name="department" value="<?php if (isset($_POST['department'])){?><?php echo $_POST['department'];?>
<?php }else{ ?>网络部<?php }?>"></p>
  <p>管理员姓名：<input type="text" name="username" value="<?php if (isset($_POST['username'])){?><?php echo $_POST['username'];?>
<?php }?>"></p>
  <p>管理员密码：<input type="text" name="password" value="<?php if (isset($_POST['password'])){?><?php echo $_POST['password'];?>
<?php }?>"></p>
  
  
  <p><input type="submit" value="提交"></p>
</form>
</body>
</html><?php }} ?>
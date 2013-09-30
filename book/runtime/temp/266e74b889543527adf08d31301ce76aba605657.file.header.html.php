<?php /* Smarty version Smarty-3.1.14, created on 2013-09-29 23:53:07
         compiled from "E:\wampserver\wamp2\www\book\book\view\default\common\header.html" */ ?>
<?php /*%%SmartyHeaderCode:326335248496d277db9-36869952%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '266e74b889543527adf08d31301ce76aba605657' => 
    array (
      0 => 'E:\\wampserver\\wamp2\\www\\book\\book\\view\\default\\common\\header.html',
      1 => 1380469967,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '326335248496d277db9-36869952',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5248496d6190a1_11077440',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5248496d6190a1_11077440')) {function content_5248496d6190a1_11077440($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>公司订餐系统</title>

<link href="<?php echo @constant('STATICS_PATH');?>
dwz/themes/default/style.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="<?php echo @constant('STATICS_PATH');?>
dwz/themes/css/core.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="<?php echo @constant('STATICS_PATH');?>
dwz/themes/css/print.css" rel="stylesheet" type="text/css" media="print"/>
<link href="<?php echo @constant('CSS_PATH');?>
main.css" rel="stylesheet" type="text/css" media="screen"/>
<!--[if IE]>
<link href="<?php echo @constant('STATICS_PATH');?>
dwz/themes/css/ieHack.css" rel="stylesheet" type="text/css" media="screen"/>
<![endif]-->

<!--[if lte IE 9]>
<script src="<?php echo @constant('STATICS_PATH');?>
dwz/js/speedup.js" type="text/javascript"></script>
<![endif]-->

<script src="<?php echo @constant('STATICS_PATH');?>
dwz/js/jquery-1.7.2.js" type="text/javascript"></script>
<script src="<?php echo @constant('STATICS_PATH');?>
dwz/js/jquery.cookie.js" type="text/javascript"></script>
<script src="<?php echo @constant('STATICS_PATH');?>
dwz/js/jquery.validate.js" type="text/javascript"></script>
<script src="<?php echo @constant('STATICS_PATH');?>
dwz/js/jquery.bgiframe.js" type="text/javascript"></script>




<script src="<?php echo @constant('STATICS_PATH');?>
dwz/js/dwz.core.js" type="text/javascript"></script>
<script src="<?php echo @constant('STATICS_PATH');?>
dwz/js/dwz.util.date.js" type="text/javascript"></script>
<script src="<?php echo @constant('STATICS_PATH');?>
dwz/js/dwz.validate.method.js" type="text/javascript"></script>
<script src="<?php echo @constant('STATICS_PATH');?>
dwz/js/dwz.barDrag.js" type="text/javascript"></script>
<script src="<?php echo @constant('STATICS_PATH');?>
dwz/js/dwz.drag.js" type="text/javascript"></script>
<script src="<?php echo @constant('STATICS_PATH');?>
dwz/js/dwz.tree.js" type="text/javascript"></script>
<script src="<?php echo @constant('STATICS_PATH');?>
dwz/js/dwz.accordion.js" type="text/javascript"></script>
<script src="<?php echo @constant('STATICS_PATH');?>
dwz/js/dwz.ui.js" type="text/javascript"></script>
<script src="<?php echo @constant('STATICS_PATH');?>
dwz/js/dwz.theme.js" type="text/javascript"></script>
<script src="<?php echo @constant('STATICS_PATH');?>
dwz/js/dwz.switchEnv.js" type="text/javascript"></script>
<script src="<?php echo @constant('STATICS_PATH');?>
dwz/js/dwz.alertMsg.js" type="text/javascript"></script>
<script src="<?php echo @constant('STATICS_PATH');?>
dwz/js/dwz.contextmenu.js" type="text/javascript"></script>
<script src="<?php echo @constant('STATICS_PATH');?>
dwz/js/dwz.navTab.js" type="text/javascript"></script>
<script src="<?php echo @constant('STATICS_PATH');?>
dwz/js/dwz.tab.js" type="text/javascript"></script>
<script src="<?php echo @constant('STATICS_PATH');?>
dwz/js/dwz.resize.js" type="text/javascript"></script>
<script src="<?php echo @constant('STATICS_PATH');?>
dwz/js/dwz.dialog.js" type="text/javascript"></script>
<script src="<?php echo @constant('STATICS_PATH');?>
dwz/js/dwz.dialogDrag.js" type="text/javascript"></script>
<script src="<?php echo @constant('STATICS_PATH');?>
dwz/js/dwz.sortDrag.js" type="text/javascript"></script>
<script src="<?php echo @constant('STATICS_PATH');?>
dwz/js/dwz.cssTable.js" type="text/javascript"></script>
<script src="<?php echo @constant('STATICS_PATH');?>
dwz/js/dwz.stable.js" type="text/javascript"></script>
<script src="<?php echo @constant('STATICS_PATH');?>
dwz/js/dwz.taskBar.js" type="text/javascript"></script>
<script src="<?php echo @constant('STATICS_PATH');?>
dwz/js/dwz.ajax.js" type="text/javascript"></script>
<script src="<?php echo @constant('STATICS_PATH');?>
dwz/js/dwz.pagination.js" type="text/javascript"></script>
<script src="<?php echo @constant('STATICS_PATH');?>
dwz/js/dwz.database.js" type="text/javascript"></script>
<script src="<?php echo @constant('STATICS_PATH');?>
dwz/js/dwz.datepicker.js" type="text/javascript"></script>
<script src="<?php echo @constant('STATICS_PATH');?>
dwz/js/dwz.effects.js" type="text/javascript"></script>
<script src="<?php echo @constant('STATICS_PATH');?>
dwz/js/dwz.panel.js" type="text/javascript"></script>
<script src="<?php echo @constant('STATICS_PATH');?>
dwz/js/dwz.checkbox.js" type="text/javascript"></script>
<script src="<?php echo @constant('STATICS_PATH');?>
dwz/js/dwz.history.js" type="text/javascript"></script>
<script src="<?php echo @constant('STATICS_PATH');?>
dwz/js/dwz.combox.js" type="text/javascript"></script>
<script src="<?php echo @constant('STATICS_PATH');?>
dwz/js/dwz.print.js" type="text/javascript"></script>


<script src="<?php echo @constant('STATICS_PATH');?>
dwz/js/dwz.regional.zh.js" type="text/javascript"></script>

<script type="text/javascript">
	var dwrPath = "<?php echo @constant('STATICS_PATH');?>
dwz/";
	
</script>



<script type="text/javascript">
$(function(){
	DWZ.init(dwrPath+"dwz.frag.xml", {
		loginUrl:"login_dialog.html", loginTitle:"登录",	// 弹出登录对话框
//		loginUrl:"login.html",	// 跳到登录页面
		statusCode:{ok:200, error:300, timeout:301}, //【可选】
		pageInfo:{pageNum:"pageNum", numPerPage:"numPerPage", orderField:"orderField", orderDirection:"orderDirection"}, //【可选】
		debug:false,	// 调试模式 【true|false】
		callback:function(){
			initEnv();
			$("#themeList").theme({themeBase:""+dwrPath+"themes"}); // themeBase 相对于index页面的主题base路径
		}
	});
});

</script>




</head><?php }} ?>
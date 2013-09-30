<?php /* Smarty version Smarty-3.1.14, created on 2013-09-26 15:11:03
         compiled from "G:\web\wamp\www\book\demo\book\view\default\index\index.html" */ ?>
<?php /*%%SmartyHeaderCode:86195240e925eac236-54131927%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b773f5747350e16047aa5e85fd9c853f3d8850b5' => 
    array (
      0 => 'G:\\web\\wamp\\www\\book\\demo\\book\\view\\default\\index\\index.html',
      1 => 1380179461,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '86195240e925eac236-54131927',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5240e9260b6015_74637127',
  'variables' => 
  array (
    'user' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5240e9260b6015_74637127')) {function content_5240e9260b6015_74637127($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../common/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<body scroll="no">
	<div id="layout">
		<div id="header">
			<div class="headerNav">
				<a class="logo" href="<?php echo @constant('SITE_PATH');?>
">公司订餐系统</a>
				<ul class="nav">
					<li class="welcome">欢迎您，<?php echo $_smarty_tpl->tpl_vars['user']->value['name'];?>
</li>
					<li><a href="<?php echo @constant('SITE_URL');?>
index.php/public/loginOut">退出</a></li>
				</ul>
				<ul class="themeList" id="themeList">
					<li><a mask="true" target="dialog" href="<?php echo @constant('SITE_URL');?>
index.php/user/edit/id/<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
">修改资料</a></li>
					<li theme="default"><div class="selected">蓝色</div></li>
					<li theme="green"><div>绿色</div></li>
					<!--<li theme="red"><div>红色</div></li>
					<li theme="purple"><div>紫色</div></li>
					<li theme="silver"><div>银色</div></li>
					<li theme="azure"><div>天蓝</div></li>-->
				</ul>
			</div>

			<!-- navMenu -->
			
		</div>

		<div id="leftside">
			<div id="sidebar_s">
				<div class="collapse">
					<div class="toggleCollapse"><div></div></div>
				</div>
			</div>
			<div id="sidebar">
				<div class="toggleCollapse"><h2>主菜单</h2><div>收缩</div></div>

				<div class="accordion" fillSpace="sidebar">
					
					<div class="accordionContent">
						<ul class="tree treeFolder">
								
									<li><a href="http://www.baidu.com" target="navTab" rel="w_validation">菜单大全</a></li>
									<li><a href="w_button.html" target="navTab" rel="w_button">餐厅菜馆</a></li>
									<li><a href="<?php echo @constant('SITE_URL');?>
index.php/cat/index" target="navTab" rel="w_textInput">菜单分类</a></li>
									<li><a href="<?php echo @constant('SITE_URL');?>
index.php/department/index" target="navTab" rel="w_combox">部门分类</a></li>
									<li><a href="<?php echo @constant('SITE_URL');?>
index.php/user/index" target="navTab" rel="w_checkbox">用户管理</a></li>
									
						</ul>
					</div>
					
				</div>
			</div>
		</div>
		<div id="container">
			<div id="navTab" class="tabsPage">
				<div class="tabsPageHeader">
					<div class="tabsPageHeaderContent"><!-- 显示左右控制时添加 class="tabsPageHeaderMargin" -->
						<ul class="navTab-tab" style="left: 0px;">
							<li class="main selected" tabid="main"><a href="javascript:;"><span><span class="home_icon">订餐大厅</span></span></a></li>
						</ul>
					</div>
					<div class="tabsLeft" style="display: none;">left</div><!-- 禁用只需要添加一个样式 class="tabsLeft tabsLeftDisabled" -->
					<div class="tabsRight" style="display: none;">right</div><!-- 禁用只需要添加一个样式 class="tabsRight tabsRightDisabled" -->
					<div class="tabsMore">more</div>
				</div>
				
				<ul class="tabsMoreList" style="display: none;">
					<li class="selected"><a href="javascript:;">订餐大厅</a></li>
				</ul>
				
				<div class="navTab-panel tabsPageContent layoutBox">
					<div class="page unitBox">
						<div class="accountInfo">
							<div class="alertInfo">
								
							</div>
							
							
						</div>
						
						
					</div>
					
				</div>
			</div>
		</div>

	</div>

	<div id="footer">powered by lijinhuan copyright@ firezp </div>
<?php echo $_smarty_tpl->getSubTemplate ("../common/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>



<?php }} ?>
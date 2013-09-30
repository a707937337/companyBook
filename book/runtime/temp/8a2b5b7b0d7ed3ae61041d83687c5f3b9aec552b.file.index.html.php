<?php /* Smarty version Smarty-3.1.14, created on 2013-09-29 23:38:21
         compiled from "E:\wampserver\wamp2\www\book\book\view\default\index\index.html" */ ?>
<?php /*%%SmartyHeaderCode:10885248496d0d8be0-37844876%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8a2b5b7b0d7ed3ae61041d83687c5f3b9aec552b' => 
    array (
      0 => 'E:\\wampserver\\wamp2\\www\\book\\book\\view\\default\\index\\index.html',
      1 => 1380390173,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10885248496d0d8be0-37844876',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5248496d253375_51146050',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5248496d253375_51146050')) {function content_5248496d253375_51146050($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../common/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
					<li><a mask="true"  href="<?php echo @constant('SITE_URL');?>
index.php/book/index" target="navTab">我的订单</a></li>
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
								
									<li><a href="<?php echo @constant('SITE_URL');?>
index.php/fast/index" target="navTab" rel="w_validation">菜单大全</a></li>
									<?php if ($_smarty_tpl->tpl_vars['user']->value['role_id']==2){?><li><a href="<?php echo @constant('SITE_URL');?>
index.php/restaurant/index" target="navTab" rel="w_button">餐厅菜馆</a></li>
									<li><a href="<?php echo @constant('SITE_URL');?>
index.php/cat/index" target="navTab" rel="w_textInput">菜单分类</a></li>
									<li><a href="<?php echo @constant('SITE_URL');?>
index.php/department/index" target="navTab" rel="w_combox">部门分类</a></li>
									<li><a href="<?php echo @constant('SITE_URL');?>
index.php/user/index" target="navTab" rel="w_checkbox">用户管理</a></li><?php }?>
									<li><a href="<?php echo @constant('SITE_URL');?>
index.php/book/index" target="navTab" rel="w_checkbox">我的订单</a></li>
									
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
					<li class="selected"><a href="javascript:;" >订餐大厅</a></li>
				</ul>
				
				<div class="navTab-panel tabsPageContent layoutBox">
					<div class="page unitBox">
							
						<div class="pageHeader">
							
							<div class="searchBar">
								<table class="searchContent">
									<tr>
										<td></td>
										<td></td>
										<td style="color:red">
											今天大家正在订餐
										</td>
										<td></td>
									</tr>
								</table>
							</div>
							
						</div>
						
						<div class="pageContent" id="nowbooking">
						
							
								
								
								
									
								
							
						</div>
					
				</div>
			</div>
		</div>

	</div>
	
	<div id="footer">powered by <a href="http://www.lijinhuan.com" tar="_blank">lijinhuan</a> copyright @firezp </div>
	<script>
	function getBook(){
		$(function(){
		   $.ajax({url:"<?php echo @constant('SITE_URL');?>
index.php/book/ajaxGetAll",global:false,cache:false,sync:false,
				success: function(msg){
					
					 $("#nowbooking").html(msg);
				}

		   
		   });

		 
		});
	}
	getBook();
	setInterval(getBook,1000);
	
	
	</script>
	
<?php echo $_smarty_tpl->getSubTemplate ("../common/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>



<?php }} ?>
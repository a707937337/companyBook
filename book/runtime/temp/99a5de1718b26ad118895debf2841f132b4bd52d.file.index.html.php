<?php /* Smarty version Smarty-3.1.14, created on 2013-09-29 01:41:23
         compiled from "E:\wampserver\wamp2\www\book\demo\book\view\default\fast\index.html" */ ?>
<?php /*%%SmartyHeaderCode:64165246c7b67f63a0-50144397%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '99a5de1718b26ad118895debf2841f132b4bd52d' => 
    array (
      0 => 'E:\\wampserver\\wamp2\\www\\book\\demo\\book\\view\\default\\fast\\index.html',
      1 => 1380390081,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '64165246c7b67f63a0-50144397',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5246c7b6ab33e3_54497761',
  'variables' => 
  array (
    'data' => 0,
    'v' => 0,
    'user' => 0,
    'countNum' => 0,
    'preNum' => 0,
    'nowPage' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5246c7b6ab33e3_54497761')) {function content_5246c7b6ab33e3_54497761($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../common/pagerForm.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	
<div class="pageHeader">
	<form  rel="pagerForm" onsubmit="return navTabSearch(this);" action="<?php echo @constant('SITE_URL');?>
index.php/fast/index" method="post">
	<div class="searchBar">
		<table class="searchContent">
			<tr>
				<td>
					名称：<input type="text" name="name" />
				</td>
				<td><div class="buttonActive"><div class="buttonContent"><button type="submit">检索</button></div></div></td>
			</tr>
		</table>
	</div>
	</form>
</div>


<div class="pageContent">
    <div class="panelBar">
		<ul class="toolBar">
			<li><a class="add" href="<?php echo @constant('SITE_URL');?>
index.php/fast/save" target="dialog" mask="true"><span>添加</span></a></li>
			<li><a class="delete" href="<?php echo @constant('SITE_URL');?>
index.php/fast/delete/id/{sid_obj}" target="ajaxTodo" title="确定要删除吗?"><span>删除</span></a></li>
			<li><a class="edit" href="<?php echo @constant('SITE_URL');?>
index.php/fast/edit/id/{sid_obj}" target="dialog" mask="true"><span>修改</span></a></li>
			<li class="line">line</li>
		</ul>
	</div>
	<table class="table" width="100%" layoutH="115">
		<thead>
			<tr>
				<th width="60" orderField="id" <?php if (isset($_POST['orderField'])&&$_POST['orderField']=='id'){?>class="<?php echo $_POST['orderDirection'];?>
"<?php }?>>序号</th>
				<th orderField="name" <?php if (isset($_POST['orderField'])&&$_POST['orderField']=='name'){?>class="<?php echo $_POST['orderDirection'];?>
"<?php }?>>菜名</th>
				<th orderField="price" <?php if (isset($_POST['orderField'])&&$_POST['orderField']=='price'){?>class="<?php echo $_POST['orderDirection'];?>
"<?php }?>>价格(元)</th>
				<th orderField="restaurant_id" <?php if (isset($_POST['orderField'])&&$_POST['orderField']=='restaurant_id'){?>class="<?php echo $_POST['orderDirection'];?>
"<?php }?>>餐馆</th>
				<th orderField="cat_id" <?php if (isset($_POST['orderField'])&&$_POST['orderField']=='cat_id'){?>class="<?php echo $_POST['orderDirection'];?>
"<?php }?>>分类</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
		<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
			<tr target="sid_obj" rel="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">
				<td><?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['v']->value['price'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['v']->value['restaurant_id'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['v']->value['cat_id'];?>
</td>
				<td><?php if ($_smarty_tpl->tpl_vars['user']->value['role_id']==2){?><a  href="<?php echo @constant('SITE_URL');?>
index.php/fast/delete/id/<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" target="ajaxTodo" title="确定要删除吗?">删除</a>  <span>|</span> <a  href="<?php echo @constant('SITE_URL');?>
index.php/fast/edit/id/<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" target="dialog" mask="true">修改</a>    <span>|</span> <?php }?>  <a  href="<?php echo @constant('SITE_URL');?>
index.php/book/save/id/<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" target="dialog" mask="true">  吃这个</a></td>
			</tr>
		<?php } ?>	
		</tbody>
	</table>
	
	
	<div class="panelBar">
		<div class="pages">
			<span>共<?php echo $_smarty_tpl->tpl_vars['countNum']->value;?>
条</span>
		</div>
		<div class="pagination" targetType="navTab" totalCount="<?php echo $_smarty_tpl->tpl_vars['countNum']->value;?>
" numPerPage="<?php echo $_smarty_tpl->tpl_vars['preNum']->value;?>
" pageNumShown="10" currentPage="<?php echo $_smarty_tpl->tpl_vars['nowPage']->value;?>
"></div>
	</div>
</div>
	
	
	
	
<?php }} ?>
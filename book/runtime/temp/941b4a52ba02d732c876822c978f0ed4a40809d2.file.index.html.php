<?php /* Smarty version Smarty-3.1.14, created on 2013-09-28 12:35:12
         compiled from "E:\wampserver\wamp2\www\book\demo\book\view\default\cat\index.html" */ ?>
<?php /*%%SmartyHeaderCode:1278152465c801bddc5-78524715%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '941b4a52ba02d732c876822c978f0ed4a40809d2' => 
    array (
      0 => 'E:\\wampserver\\wamp2\\www\\book\\demo\\book\\view\\default\\cat\\index.html',
      1 => 1380099960,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1278152465c801bddc5-78524715',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'v' => 0,
    'countNum' => 0,
    'preNum' => 0,
    'nowPage' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52465c803e91a0_61129360',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52465c803e91a0_61129360')) {function content_52465c803e91a0_61129360($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../common/pagerForm.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	
<div class="pageHeader">
	<form  rel="pagerForm" onsubmit="return navTabSearch(this);" action="<?php echo @constant('SITE_URL');?>
index.php/cat/index" method="post">
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
index.php/cat/save" target="dialog" mask="true"><span>添加</span></a></li>
			<li><a class="delete" href="<?php echo @constant('SITE_URL');?>
index.php/cat/delete/id/{sid_obj}" target="ajaxTodo" title="确定要删除吗?"><span>删除</span></a></li>
			<li><a class="edit" href="<?php echo @constant('SITE_URL');?>
index.php/cat/edit/id/{sid_obj}" target="dialog" mask="true"><span>修改</span></a></li>
			<li class="line">line</li>
		</ul>
	</div>
	<table class="table" width="100%" layoutH="115">
		<thead>
			<tr>
				<th width="60" orderField="id" <?php if (isset($_POST['orderField'])&&$_POST['orderField']=='id'){?>class="<?php echo $_POST['orderDirection'];?>
"<?php }?>>序号</th>
				<th orderField="name" <?php if (isset($_POST['orderField'])&&$_POST['orderField']=='name'){?>class="<?php echo $_POST['orderDirection'];?>
"<?php }?>>名称</th>
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
				<td><a  href="<?php echo @constant('SITE_URL');?>
index.php/cat/delete/id/<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" target="ajaxTodo" title="确定要删除吗?">删除</a>  <span>|</span> <a  href="<?php echo @constant('SITE_URL');?>
index.php/cat/edit/id/<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" target="dialog" mask="true">修改</a></td>
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
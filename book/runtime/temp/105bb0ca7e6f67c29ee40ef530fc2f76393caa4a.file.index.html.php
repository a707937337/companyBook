<?php /* Smarty version Smarty-3.1.14, created on 2013-09-29 23:38:35
         compiled from "E:\wampserver\wamp2\www\book\book\view\default\department\index.html" */ ?>
<?php /*%%SmartyHeaderCode:204135248497bdbf838-19520790%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '105bb0ca7e6f67c29ee40ef530fc2f76393caa4a' => 
    array (
      0 => 'E:\\wampserver\\wamp2\\www\\book\\book\\view\\default\\department\\index.html',
      1 => 1380460077,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '204135248497bdbf838-19520790',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dep' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5248497c01f2f3_48760233',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5248497c01f2f3_48760233')) {function content_5248497c01f2f3_48760233($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("../common/pagerForm.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	
<div class="pageHeader">
	<form  rel="pagerForm" onsubmit="return navTabSearch(this);" action="<?php echo @constant('SITE_URL');?>
index.php/department/index" method="post">
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
index.php/department/save" target="dialog" mask="true"><span>添加</span></a></li>
			<li><a class="delete" href="<?php echo @constant('SITE_URL');?>
index.php/department/delete/id/{sid_obj}" target="ajaxTodo" title="确定要删除吗?"><span>删除</span></a></li>
			<li><a class="edit" href="<?php echo @constant('SITE_URL');?>
index.php/department/edit/id/{sid_obj}" target="dialog" mask="true"><span>修改</span></a></li>
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
		
			<?php echo $_smarty_tpl->tpl_vars['dep']->value;?>

		
		</tbody>
	</table>
	
	
	
</div>
	
	
	
	
<?php }} ?>
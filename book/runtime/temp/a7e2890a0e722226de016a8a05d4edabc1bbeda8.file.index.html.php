<?php /* Smarty version Smarty-3.1.14, created on 2013-09-29 23:44:23
         compiled from "E:\wampserver\wamp2\www\book\book\view\default\book\index.html" */ ?>
<?php /*%%SmartyHeaderCode:1347452484ad7d8cc01-12195472%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a7e2890a0e722226de016a8a05d4edabc1bbeda8' => 
    array (
      0 => 'E:\\wampserver\\wamp2\\www\\book\\book\\view\\default\\book\\index.html',
      1 => 1380387355,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1347452484ad7d8cc01-12195472',
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
  'unifunc' => 'content_52484ad812a669_36321192',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52484ad812a669_36321192')) {function content_52484ad812a669_36321192($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'E:\\wampserver\\wamp2\\www\\book\\firezp\\driver\\tpl\\smarty\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("../common/pagerForm.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	
<div class="pageHeader">
	<form  rel="pagerForm" onsubmit="return navTabSearch(this);" action="<?php echo @constant('SITE_URL');?>
index.php/book/index" method="post">
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
			<li><a class="delete" href="<?php echo @constant('SITE_URL');?>
index.php/book/delete/id/{sid_obj}" target="ajaxTodo" title="确定要删除吗?"><span>删除</span></a></li>
			<li class="line">line</li>
		</ul>
	</div>
	<table class="table" width="100%" layoutH="115">
		<thead>
			<tr>
				<th width="60" orderField="id" <?php if (isset($_POST['orderField'])&&$_POST['orderField']=='id'){?>class="<?php echo $_POST['orderDirection'];?>
"<?php }?>>序号</th>
				<th>菜名</th>
				<th>价格(元)</th>
				<th>餐馆</th>
				<th>分类</th>
				<th>点菜时间</th>
				<th>备注</th>
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
				<td <?php if (date('Y-m-d',time())==date('Y-m-d',$_smarty_tpl->tpl_vars['v']->value['addtime'])){?>style="color:red"<?php }?>><?php echo $_smarty_tpl->tpl_vars['v']->value['book']['name'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['v']->value['book']['price'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['v']->value['book']['restaurant_id'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['v']->value['book']['cat_id'];?>
</td>
				<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['addtime'],"%Y-%m-%d  %H:%M:%S");?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['v']->value['note'];?>
</td>
				<td><a  href="<?php echo @constant('SITE_URL');?>
index.php/book/delete/id/<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
" target="ajaxTodo" title="确定要删除吗?">删除</a></td>
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
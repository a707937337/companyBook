<?php
/**
 * cat控制器
 */   
class bookController extends commonController {
	public $table = 'book';	

	
	public function saveAction(){
		
		
		
		
		if(fpBase('http')->isPost()){
			$_POST['user_id'] = $this->userInfo['id'];
			$_POST['addtime'] = time();
		}else{
			//获取id
			$id = intval(fpBase('http')->getQuery('id'));
			$fast = M('fast')->find('id='.$id);
			if(empty($fast)){
				exit(json_encode(array('statusCode'=>300,'message'=>'请先点菜')));
			}else{
				$fast['restaurant_id'] = M('restaurant')->getName($fast['restaurant_id']);
				$fast['cat_id'] = M('cat')->getName($fast['cat_id']);
			}
			$this->assign('fast', $fast);
		}
		
		parent::saveAction();
	}
	
	
	public function indexAction(){
		$preNum = C('page');
		$condition = ' user_id='.$this->userInfo['id'];
		$name = fpBase('http')->getPost('name');
		$orderDirection = fpBase('http')->getPost('orderDirection');
		$orderField = fpBase('http')->getPost('orderField');
		$pageNum = fpBase('http')->getPost('pageNum')?fpBase('http')->getPost('pageNum')-1:0;
		if(!empty($orderField)){$order='`'.$orderField.'` '.$orderDirection;}else{$order='`id` desc';}
		if(fpBase('http')->isPost() && !empty($name)){
			$condition = "and name like '%{$name}%'";
		}
		$count = M($this->table)->where($condition)->order($order)->count();
		$data = M($this->table)->where($condition)->order($order)->limit($pageNum*$preNum,$preNum)->doFind();
		
		foreach($data as $key=>$val){
			$data[$key]['book'] = $this->findBook($val['fast_id']);
		}
		
		$this->assign('countNum', $count);
		$this->assign('data', $data);
		$this->assign('preNum', $preNum);
		$this->assign('nowPage', $pageNum+1);
		$this->display();
	}
	
	
	private function findBook($id){
	
		$data = M('fast')->find('id='.$id);
		if(!empty($data)){
			$data['cat_id'] = M('cat')->getName($data['cat_id']);
			$data['restaurant_id'] = M('restaurant')->getName($data['restaurant_id']);
		}
		return $data;
	}
	
	
	public function editAction(){
		exit();
	}
	
	
	public function ajaxGetAllAction(){
		$data = M($this->table)->order('id desc')->where("DATE_FORMAT(FROM_UNIXTIME(addtime),'%Y-%m-%d')=DATE_FORMAT(NOW(),'%Y-%m-%d')")->doFind();
		$str=<<<mark
			
			<div class="j-resizeGrid" style="overflow: auto; height: auto;" layouth="115">
			<div class="grid">
				
				<div class="gridHeader">
				<table style="width:1063px;">
				<thead>
									<tr>
										<th width="20">序号</th>
										<th width="50">用户</th>
										<th width="60">菜名</th>
										<th width="30">价格(元)</th>
										<th width="40">餐馆</th>
										<th width="30">分类</th>
										<th width="30">点菜时间</th>
										<th width="70">备注</th>
										<th width="40">操作</th>
									</tr>
								</thead>
								</table>
				</div>
				<div class="gridScroller" style="width:1063px;">
				<div class="gridTbody">
				<table style="width:1063px;">
								<tbody >
mark;
		$center = '';
		$url = SITE_URL;
		foreach($data as $key=>$val){
			$book = $this->findBook($val['fast_id']);
			$time = date(' H : i : s',$val['addtime']);
			$name = M('user')->getName($val['user_id']);
			$center.=<<<cent
						<tr target="sid_obj" rel="">
												<td width="20">{$val['id']}</td>
												<td width="50">{$name}</td>
												<td width="60">{$book['name']}</td>
												<td width="30">{$book['price']}</td>
												<td width="40">{$book['restaurant_id']}</td>
												<td width="30">{$book['cat_id']}</td>
												<td width="30">{$time}</td>
												<td width="70">{$val['note']}</td>
												<td width="40"><a onmouseover="this.style.cursor='pointer'" onclick="showdi('{$url}index.php/book/save/id/{$book['id']}')" target="dialog" mask="true">我也吃这个</a></td>
											</tr>
											
										
				
cent;
	
		}	
		$end=<<<mm
			
		</tbody></table></div></div></div></div>
		<script>
			var o = {mask:true};
			function showdi(url){
			
				 $.pdialog.open(url, '_blank', '吃这个',o);
			}
		
		</script>
mm;
		
		exit($str.$center.$end);
	}
}
		
			
?>
<?php
/**
 * cat控制器
 */   
class fastController extends commonController {
	public $table = 'fast';	

	
	public function saveAction(){
		//所有餐馆
		$restaurant = M('restaurant')->findAll();
		$this->assign('restaurant', $restaurant);
		//分类
		$cat = M('cat')->findAll();
		$this->assign('cat', $cat);
		parent::saveAction();
	}
	
	
	public function indexAction(){
		$preNum = C('page');
		$condition = '';
		$name = fpBase('http')->getPost('name');
		$orderDirection = fpBase('http')->getPost('orderDirection');
		$orderField = fpBase('http')->getPost('orderField');
		$pageNum = fpBase('http')->getPost('pageNum')?fpBase('http')->getPost('pageNum')-1:0;
		if(!empty($orderField)){$order='`'.$orderField.'` '.$orderDirection;}else{$order='';}
		if(fpBase('http')->isPost() && !empty($name)){
			$condition = "name like '%{$name}%'";
		}
		$count = M($this->table)->where($condition)->order($order)->count();
		$data = M($this->table)->where($condition)->order($order)->limit($pageNum*$preNum,$preNum)->doFind();
		foreach($data as $key=>$val){
			$data[$key]['cat_id'] = M('cat')->getName($val['cat_id']);
			$data[$key]['restaurant_id'] = M('restaurant')->getName($val['restaurant_id']);
		}
		$this->assign('countNum', $count);
		$this->assign('data', $data);
		$this->assign('preNum', $preNum);
		$this->assign('nowPage', $pageNum+1);
		$this->display();
	}
	
	
	public function editAction(){
		//所有餐馆
		$restaurant = M('restaurant')->findAll();
		$this->assign('restaurant', $restaurant);
		//分类
		$cat = M('cat')->findAll();
		$this->assign('cat', $cat);
		parent::editAction();
	}
	
}
		
			
?>
<?php
/**
 * 用户控制器
 */   
class userController extends commonController {
	public $table = 'user';	
	
	
	//保存
	public function saveAction(){
		$department_id = fpBase('http')->getParam('department_id');
		if(!empty($department_id)){
			$result = M('department')->find('pid='.intval($department_id));
			if($result){
				exit(json_encode(array('statusCode'=>300,'message'=>'错误选择，选择的部门还有下级，请选择所在部门')));
			}
		}
		$password = fpBase('http')->getPost('password');
		if(!empty($password)){
			$_POST['password'] = md5($password);
		}
		$dep = M('department')->getSelect(-1);
		$this->assign('dep', $dep);
		parent::saveAction();
	}
	
	
	//编辑
	public function editAction(){
		$department_id = fpBase('http')->getParam('department_id');
		if(!empty($department_id)){
			$result = M('department')->find('pid='.intval($department_id));
			if($result){
				exit(json_encode(array('statusCode'=>300,'message'=>'错误选择，选择的部门还有下级，请选择所在部门')));
				
			}
		}
		$uid = fpBase('http')->getParam('id');
		$user = M('user')->find('id='.intval($uid));
		if(!empty($user)){
			
			$dep = M('department')->getSelect($user['department_id']);
		}else{
			exit(json_encode(array('statusCode'=>300,'message'=>'用户不存在')));
		}
		$password = fpBase('http')->getPost('password');
		if(empty($password)){
			unset($_POST['password']);
		}else{
			$_POST['password'] = md5($_POST['password']);
		}
		if(fpBase('http')->isPost()){
			fpBase('cache')->write('user_uid_'.get_cookie('uid'),null);
		}
		$this->assign('dep', $dep);
		parent::editAction();
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
		foreach ($data as $key=>$val){
			$data[$key]['department_id'] = M('department')->getName($val['department_id']);
		}
		
		$this->assign('countNum', $count);
		$this->assign('data', $data);
		$this->assign('preNum', $preNum);
		$this->assign('nowPage', $pageNum+1);
		$this->display();
	}
	
	
}
		
		
?>

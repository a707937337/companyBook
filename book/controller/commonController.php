<?php
class commonController extends controller {
	public $table;
	public $userInfo;
	
	public function init(){
		//安装检查
		if(!file_exists(APP_PATH.'runtime/install_lock.txt')){
			$this->showMessage('正进入安装程序...',1,SITE_URL.'index.php/install/index',1);
		}
		//登陆检查
		$this->checkLogin();
		//获取用户信息
		$user = fpBase('cache')->read('user_uid_'.get_cookie('uid'));
		if(empty($user)){
			$user = M('user')->where('id='.get_cookie('uid'))->doFind('id,name,department_id,role_id,qq,tel');
			if(!empty($user)){
				$user = $user[0];
			}
		}
		$this->userInfo = $user;
		$this->assign('user',$user);
		$this->checkPra($user);
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
		$this->assign('countNum', $count);
		$this->assign('data', $data);
		$this->assign('preNum', $preNum);
		$this->assign('nowPage', $pageNum+1);
		$this->display();
	}
	
	
	//删除
	public function deleteAction(){
		$id = intval(fpBase('http')->getQuery('id'));
		if(M($this->table)->delete('id='.$id)){
			exit(json_encode(array('statusCode'=>200,'message'=>'操作成功')));
		}else{
			exit(json_encode(array('statusCode'=>300,'message'=>'操作失败')));
		}
	}
	
	
	//修改
	public function editAction(){
		$id = intval(fpBase('http')->getQuery('id'));
		if(fpBase('http')->isPost()){
			M($this->table)->data = $_POST;
			$id = intval(fpBase('http')->getPost('id'));
			if(M($this->table)->update('id='.$id)){
				exit(json_encode(array('statusCode'=>200,'message'=>'操作成功','callbackType'=>'closeCurrent')));
			}else{
				foreach(validate::getMsg() as $val){
					exit(json_encode(array('statusCode'=>300,'message'=>$val)));
				}
				exit(json_encode(array('statusCode'=>300,'message'=>'操作失败')));
			}
		}else{
			$data = M($this->table)->find('id='.$id);
			$this->assign('data', $data);
			$this->display();
		}
	}
	
	
	//增加
	public function saveAction(){
		if(fpBase('http')->isPost()){
			M($this->table)->data = $_POST;
			if(M($this->table)->save()){
				exit(json_encode(array('statusCode'=>200,'message'=>'操作成功','callbackType'=>'closeCurrent')));
			}else{
				foreach(validate::getMsg() as $val){
					exit(json_encode(array('statusCode'=>300,'message'=>$val)));
				}
				exit(json_encode(array('statusCode'=>300,'message'=>'操作失败')));
			}
		}else{
			$this->display();
		}
	}
	
	
	private function checkLogin(){
		$username = get_cookie('username');
		$uid = get_cookie('uid');
		$key = get_cookie('key');
		if(!empty($username) && !empty($uid)  && !empty($key)){
			$password  = get_cookie('key') ;
			$res = M('user')->find('id='.get_cookie('uid'));
			
			if($res){
				if($res['password']!=$password){
					//跳转到登陆页面
					$this->showMessage('请先登录',1,SITE_URL.'index.php/public/login',0);
				}
			}else{
				//跳转到登陆页面
					$this->showMessage('请先登录',1,SITE_URL.'index.php/public/login',0);
			}
		}else{
			//跳转到登陆页面
			$this->showMessage('请先登录',1,SITE_URL.'index.php/public/login',0);
		}
	}
	
	
	public function checkPra($user){
		//公共模块返回
		$nowAction = CONTROLLER.'-'.ACTION;
		if(in_array(CONTROLLER,array('public','index'))){
			return true;
		}
		
		if($user['role_id']==1){
			$list = array(
				'book-ajaxGetAll','book-save','book-index','book-delete',
				'fast-index','user-edit',
			);
			if(!in_array($nowAction,$list)){
				if(fpBase('http')->isPost()){
					exit(json_encode(array('statusCode'=>300,'message'=>'权限不足')));
				}
				exit('权限不足 !');
			}else{
				if($nowAction=='user-edit'){
					$role = fpBase('http')->getPost('role_id');
					if($role!=1 && !empty($role)){
						exit(json_encode(array('statusCode'=>300,'message'=>'你只能选择普通会员身份')));
					}
				}
			}
		}else{
			return true;
		}
	
	}
	
}
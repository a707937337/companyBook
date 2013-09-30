<?php
class publicController extends controller{
	
	public function init(){
		//安装检查
		if(!file_exists(APP_PATH.'runtime/install_lock.txt')){
			$this->showMessage('请先安装程序...',1,SITE_URL.'index.php/install/index',1);
		}
	}
	
	
	//登陆
	public function loginAction(){
		$this->checkIsLogin();
		$msg = '';
		if(fpBase('http')->isPost()){
			if(!fpBase('http')->getPost('name')){
				$msg = '用户名不能为空';
			}else if(!fpBase('http')->getPost('password')){
				$msg = '密码不能为空';
			}else{
				$result = M('user')->checkPassword(fpBase('http')->getPost('name'),fpBase('http')->getPost('password'));
				if($result){
					set_cookie('username',$result['name'],3600*24*365);
					set_cookie('uid',$result['id'],3600*24*365);
					set_cookie('key',$result['password'],3600*24*365);
					unset($result['password']);
					fpBase('cache')->write('user_uid_'.$result['id'],$result);
					$this->redirect(SITE_URL);
				}else{
					$msg = '用户名或者密码不正确！';
				}
			}	
		}
		$this->assign('msg', $msg);
		$this->display();
	}
	
	
	//退出
	public function loginOutAction(){
		if(get_cookie('username') || get_cookie('uid') || get_cookie('key')){
			fpBase('cache')->delete('user_uid_'.get_cookie('uid'));
			set_cookie('uid','',-1);
			set_cookie('username','',-1);
			set_cookie('key','',-1);
			$this->showMessage('成功退出',1,SITE_URL.'index.php/public/login',1);
		}else{
			$this->showMessage('成功退出',1,SITE_URL.'index.php/public/login',1);
		}
	}
	
	
	//是否已经登陆了
	private function checkIsLogin(){
		$username = get_cookie('username');
		$uid = get_cookie('uid');
		$key = get_cookie('key');
		if(!empty($username) && !empty($uid)  && !empty($key)){
			$password  = get_cookie('key') ;
			$res = M('user')->find('id='.get_cookie('uid'));
			if($res){
				if($res['password']==$password){
					
					//跳转到登陆页面
					$this->showMessage('你已经登陆了',1,SITE_URL,2);
				}
			}
			
		}
	}
	
}
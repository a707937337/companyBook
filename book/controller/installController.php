<?php
class installController extends controller{
	
	public function indexAction(){
		$msg = '';
		//安装检查
		if(file_exists(APP_PATH.'runtime/install_lock.txt')){
			exit('你已经安装过程序了，如需重新安装，请先删除runtime下的install_lock.txt文件');
		}
		//检查是否是可以写
		@file_put_contents(APP_PATH.'conf/confing_test.inc.php','');
		if(!file_exists(APP_PATH.'conf/confing_test.inc.php')){
			$msg = 'conf目录不可写，请给其权限';
		}else{
			unlink(APP_PATH.'conf/confing_test.inc.php');
		}
		
		@file_put_contents(APP_PATH.'runtime/confing_test.inc.php','');
		if(!file_exists(APP_PATH.'runtime/confing_test.inc.php')){
			$msg = 'runtime目录不可写，请给其权限';
		}else{
			unlink(APP_PATH.'runtime/confing_test.inc.php');
		}
		
		if(fpBase('http')->isPost()){
			//验证
			$msg = $this->checkEmpty();
			if(empty($msg)){
				//数据库链接测试
				$link = null;
				if(!$link = @mysql_pconnect(fpBase('http')->getPost('dbhost'), fpBase('http')->getPost('dbuser'), fpBase('http')->getPost('dbpassword'), 1)){
					$msg = 'mysql无法链接，请确实是否填写有误';
				}else{
					mysql_query("set names utf8");
					if(!mysql_select_db(fpBase('http')->getPost('dbname'), $link)){
						$msg = '数据库名不存在，请在数据库创建，或者选择已有数据库';
					}
				}
			}
			if(empty($msg)){
				//创建数据库表
				$sqls = $this->getSqlStr();
				$sqlArr = explode(';',$sqls);
				$flag = true;
				foreach($sqlArr as $val){
					$val = str_replace('book_',trim(fpBase('http')->getPost('pre')),trim($val));
					$flag = mysql_query($val);
					if(!$flag){
						$msg = '创建数据库表失败！';
						break;
					}
				}
				if($flag){
					//创建部门
					$department = fpBase('http')->getPost('department');
					$sql = "insert into ".trim(fpBase('http')->getPost('pre'))."department values('','{$department}','0')";
					$flag = @mysql_query($sql);
					if(!$flag){
						$msg = '部门创建失败';
					}else{
						$username = fpBase('http')->getPost('username');
						$qq = fpBase('http')->getPost('qq');
						$tel = fpBase('http')->getPost('tel');
						$password = md5(fpBase('http')->getPost('password'));
						$sql = "insert into ".trim(fpBase('http')->getPost('pre'))."user values('','{$username}','1','{$qq}','{$tel}','{$password}','2')";
						$flag = @mysql_query($sql);
						if(!$flag){
							$msg = '管理员创建失败';
						}else{
							//替换
							$conf = file_get_contents(APP_PATH.'conf/confing.inc.php');
							$conf = preg_replace('/\'host\'\s*\=\>\s*\'.*?\'/is',"'host' => '".fpBase('http')->getPost('dbhost')."'",$conf);
							$conf = preg_replace('/\'name\'\s*\=\>\s*\'.*?\'/is',"'name' => '".fpBase('http')->getPost('dbname')."'",$conf);
							$conf = preg_replace('/\'user\'\s*\=\>\s*\'.*?\'/is',"'user' => '".fpBase('http')->getPost('dbuser')."'",$conf);
							$conf = preg_replace('/\'password\'\s*\=\>\s*\'.*?\'/is',"'password' => '".fpBase('http')->getPost('dbpassword')."'",$conf);
							$conf = preg_replace('/\'pre\'\s*\=\>\s*\'.*?\'/is',"'pre' => '".fpBase('http')->getPost('pre')."'",$conf);
							file_put_contents(APP_PATH.'conf/confing.inc.php',$conf);
							//创建txt
							file_put_contents(APP_PATH.'runtime/install_lock.txt','');
							
							$this->showMessage('成功安装，请使用管理员姓名和密码登陆后台',1,SITE_URL.'index.php/public/login',1);
						}
					}
				}
			}
		
		}
		$this->assign('msg', $msg);
		$this->display();
	}
	
	
	
	private function checkEmpty(){
		$msg = '';
		if(!fpBase('http')->getPost('dbhost')){
				$msg = '数据库地址不能为空';
		}else if(!fpBase('http')->getPost('dbname')){
				$msg = '数据库名不能为空';
		}else if(!fpBase('http')->getPost('dbuser')){
				$msg = '数据库用户不能为空';
		}else if(!fpBase('http')->getPost('pre')){
				$msg = '数据表前缀不能为空';
		}else if(!fpBase('http')->getPost('department')){
				$msg = '管理员所在部门不能为空';
		}else if(!fpBase('http')->getPost('username')){
				$msg = '管理员姓名不能为空';
		}else if(!fpBase('http')->getPost('password')){
				$msg = '管理员密码不能为空';
		}else if(!fpBase('http')->getPost('qq')){
				$msg = '管理员qq不能为空';
		}else if(!fpBase('http')->getPost('tel')){
				$msg = '管理员电话号码不能为空';
		}
		
		return $msg;
	
	}
	
	private function getSqlStr(){
		$str=<<<mark
		
		
CREATE TABLE IF NOT EXISTS `book_book` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fast_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `note` text NOT NULL,
  `addtime` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `book_cat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf32 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `book_department` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `pid` mediumint(9) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `book_fast` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `cat_id` mediumint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `book_restaurant` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `book_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(225) NOT NULL,
  `department_id` smallint(6) unsigned NOT NULL,
  `qq` varchar(225) NOT NULL,
  `tel` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `role_id` smallint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 
		
		
mark;
		return $str;
	}
	
}

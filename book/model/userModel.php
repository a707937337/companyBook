<?php
class userModel extends model{
	public $table = 'user';
	public $attributes = array(
			'id' => '用户id',
			'name' => '用户名称',
			'password' => '密码',
			'department_id' => '部门',
			'role_id' => '角色',
			'qq' => 'qq',
			'tel' => '手机号码',
	);
	
	
	/**
	 * 简单自动验证
	 * @return
	*/
	function rules(){
		return array(
				array('id','required','id不能为空',array('update')),
				array('name','one','用户已存在，不能重复',array('save','update'),'id'),
				array('password','required','密码不能为空',array('save')),
				array('name,qq,tel,role_id,department_id','required'),
				array('department_id,qq,tel,role_id','number'),
				array('role_id','inarray',array(1,2)),//1普通会员，2为管理员
		);
	}
	
	
	/**
	 * 检测密码和用户名
	 * @param unknown $name
	 * @param unknown $password
	 * @return boolean
	 */
	public function checkPassword($name,$password){
		$result = $this->find(array('name'=>$name));
		if(empty($result)){
			return false;
		}else{
			if($result['password']!=md5($password)){
				return false;
			}
		}
		return $result;
	}
	
	public function getName($id){
		$name = '';
		$result = $this->find('id='.$id,'name');
		if(!empty($result)){
			$name = $result['name'];
		}
		return $name;
	}
}
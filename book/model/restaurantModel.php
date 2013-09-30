<?php
class restaurantModel extends model{
	public $table = 'restaurant';
	public $attributes = array(
			'id' => 'id',
			'name' => '分类名称',
			'address' => '地址',
			'tel' => '电话号码'
	);
	
	
	/**
	 * 简单自动验证
	 * @return
	*/
	function rules(){
		return array(
				array('id','required','id不能为空',array('update')),
				array('name','one','用户已存在，不能重复',array('save','update'),'id'),
				array('name,address,tel','required'),
				array('tel','number'),
		);
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
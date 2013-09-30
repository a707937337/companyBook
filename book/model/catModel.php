<?php
class catModel extends model{
	public $table = 'cat';
	public $attributes = array(
			'id' => 'id',
			'name' => '分类名称',
	);
	
	
	/**
	 * 简单自动验证
	 * @return
	*/
	function rules(){
		return array(
				array('id','required','id不能为空',array('update')),
				array('name','one','用户已存在，不能重复',array('save','update'),'id'),
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
<?php
class fastModel extends model{
	public $table = 'fast';
	public $attributes = array(
			'id' => 'id',
			'name' => '菜名',
			'price' => '价格',
			'restaurant_id' => '餐厅',
			'cat_id' => '分类'
	);
	
	
	/**
	 * 简单自动验证
	 * @return
	*/
	function rules(){
		return array(
				array('id','required','id不能为空',array('update')),
				array('name,price,restaurant_id,cat_id','required'),
				array('restaurant_id,cat_id,price','number'),
		);
	}
	
	
	
}
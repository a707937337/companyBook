<?php
class bookModel extends model{
	public $table = 'book';
	public $attributes = array(
			'id' => 'id',
			'fast_id' => '菜',
			'user_id' => '用户id',
			'note' => '备注',
			'addtime' => '添加时间'
	);
	
	
	/**
	 * 简单自动验证
	 * @return
	*/
	function rules(){
		return array(
				array('id','required','id不能为空',array('update')),
				array('fast_id,user_id,addtime','required'),
				array('fast_id,user_id,addtime','number'),
		);
	}
	
	
	
}
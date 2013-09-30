<?php
/**
 * cat控制器
 */   
class restaurantController extends commonController {
	public $table = 'restaurant';	

	//删除
	public function deleteAction(){
		$id = intval(fpBase('http')->getQuery('id'));
		
		//先判断该分类下是否有菜，有的话就不能删除
		$restaurant = M('fast')->find('restaurant_id='.$id);
		if(!empty($restaurant)){
			exit(json_encode(array('statusCode'=>300,'message'=>'该菜馆下还有菜单，无法删除')));
		}
		if(M($this->table)->delete('id='.$id)){
			exit(json_encode(array('statusCode'=>200,'message'=>'操作成功')));
		}else{
			exit(json_encode(array('statusCode'=>300,'message'=>'操作失败')));
		}
	}
}
		
			
?>
<?php
/**
 * cat控制器
 */   
class catController extends commonController {
	public $table = 'cat';	

	//删除
	public function deleteAction(){
		$id = intval(fpBase('http')->getQuery('id'));
		
		//先判断该分类下是否有菜，有的话就不能删除
		$cat = M('fast')->find('cat_id='.$id);
		if(!empty($cat)){
			exit(json_encode(array('statusCode'=>300,'message'=>'该分类下还有菜单，无法删除')));
		}
		if(M($this->table)->delete('id='.$id)){
			exit(json_encode(array('statusCode'=>200,'message'=>'操作成功')));
		}else{
			exit(json_encode(array('statusCode'=>300,'message'=>'操作失败')));
		}
	}
}
		
			
?>
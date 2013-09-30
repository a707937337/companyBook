<?php
/**
 * 控制器
 */   
class departmentController extends commonController {
	public $table = 'department';	

	
	
	public function indexAction(){
		$dep = M('department')->getTable();
		
	
		
		$this->assign('dep', $dep );

		$this->display();
	}
	
	
	public function saveAction(){
		
		$dep = M('department')->getSelect(0);
		$this->assign('dep', $dep);
		parent::saveAction();
	}
	
	
	//删除
	public function deleteAction(){
		$id = intval(fpBase('http')->getQuery('id'));
		//判断该分类是否是顶级分类，顶级分类则不能删除
		$cat = M('department')->find('pid='.$id);
		if(!empty($cat)){
			exit(json_encode(array('statusCode'=>300,'message'=>'该分类下还有子分类，请先删除子分类')));
		}
		//先判断该分类下是否有用户，有的话就不能删除
		$dep = M('user')->find('department_id='.$id);
		if(!empty($dep)){
			exit(json_encode(array('statusCode'=>300,'message'=>'该分类下还有用户，无法删除')));
		}
		if(M($this->table)->delete('id='.$id)){
			exit(json_encode(array('statusCode'=>200,'message'=>'操作成功')));
		}else{
			exit(json_encode(array('statusCode'=>300,'message'=>'操作失败')));
		}
	}
	
	
	
	//修改
	public function editAction(){
		$department_id = fpBase('http')->getParam('id');
		$cat = M('department')->find('id='.$department_id);
		if(empty($cat)){
			exit(json_encode(array('statusCode'=>300,'message'=>'选择的部门有误')));
		}else{
			$dep = M('department')->getSelect($cat['pid']);
		}
		
		$this->assign('dep', $dep);
		parent::editAction();
	}
	
}
		
			
?>
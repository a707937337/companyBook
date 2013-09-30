<?php
class departmentModel extends model{
	public $table = 'department';
	public $attributes = array(
			'id' => 'id',
			'name' => '部门名称',
			'pid' => '上级id',
	);
	
	
	/**
	 * 简单自动验证
	 * @return
	*/
	function rules(){
		return array(
				array('name','one','用户已存在，不能重复',array('save','update'),'id'),
				array('id','required','id不能为空',array('update')),
				array('name','required'),
				array('pid','number'),
		);
	}
	
	
	
	
	/**
	 * 获取指定父分类的树形结构
	 * @return integer $pid 父分类ID
	 * @return array 指定父分类的树形结构
	 */
	public function getSelect($nowid,$pid = 0)
	{
		if($nowid==0){
			$list = '<option value="0">无上级</option>';
		}else{
			$list = '<option value="">请选择</option>';
		}
		
		// 子分类树形结构
		if($pid != 0) {
			return $this->_MakeTree($pid,$nowid);
		}
		// 全部分类树形结构
		set_time_limit(0);
		$list.= $this->_MakeTree($pid,$nowid);
		return $list;
	}
	
	
	/**
	 * 递归形成树形结构
	 * @param integer $pid 父分类ID
	 * @param integer $level 等级
	 * @return array 树形结构
	 */
	private function _MakeTree($pid,$nowid,$level = 0)
	{
		$flag = '';
		$list = '';
		$result = $this->where('pid='.$pid)->doFind();
		if($result) {
			foreach($result as $key => $value) {
				if($nowid==$value['id']){
					$flag = 'selected="selected"';
				}
				$list.='<option '.$flag.'  value="'.$value['id'].'">'.$this->getNbsp($level).'|-'.$value['name'].'</option>';
				$list.=$this->_MakeTree($value['id'],$nowid,$level+1);
			}
		}
		return $list;
	}
	
	
	private function getNbsp($num){
		$str = '';
		for($i=0;$i<$num;$i++){
			$str.='&nbsp;&nbsp;&nbsp;&nbsp;';
		}
		return $str;
	}
	
	
	public function getName($id){
		$res = $this->find(array('id'=>$id));
		if(!empty($res)){
			return $res['name'];
		}else{
			return false;
		}
	}
	
	
	/**
	 * 获取指定父分类的树形结构
	 * @return integer $pid 父分类ID
	 * @return array 指定父分类的树形结构
	 */
	public function getTable()
	{
		$list = '';
		// 全部分类树形结构
		set_time_limit(0);
		$list.= $this->_MakeTable(0);
		return $list;
	}
	
	/**
	 * 递归形成树形结构
	 * @param integer $pid 父分类ID
	 * @param integer $level 等级
	 * @return array 树形结构
	 */
	private function _MakeTable($pid,$level = 0)
	{
		$flag = '';
		$list = '';
		$result = $this->where('pid='.$pid)->doFind();
		if($result) {
			foreach($result as $key => $value) {
				
				$list.='<tr target="sid_obj" rel="'.$value['id'].'"><td>'.$value['id'].'</td><td>'.$this->getNbsp($level).'  |-  '.$value['name'].'</td><td><a  href="'.SITE_URL.'index.php/department/delete/id/'.$value['id'].'" target="ajaxTodo" title="确定要删除吗?">删除</a>  <span>|</span> <a   href="'.SITE_URL.'index.php/department/edit/id/'.$value['id'].'"  target="dialog" mask="true">修改</a></td></tr>';
				$list.=$this->_MakeTable($value['id'],$level+1);
			}
		}
		return $list;
	}
	
}
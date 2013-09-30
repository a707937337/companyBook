<?php
/**
 * validate；模型验证类
 * @author lijinhuan
 * @link   http://www.lijinhuan.com
 */
class validate{
	private static $msg = array();
	private static $data = array();
	private static $attribute = array();
	private static $validateVal = array();
	private static $modelAction = null;
	private static $model = null;
	
	private static function issetVal($val){
		if(isset(self::$data[$val])){
			return true;
		}else{
			self::$msg[] =  self::$attribute[$val].'不存在';
		}
	}
	
	/**
	 * 
	 * @param array  $data 需要进入数据的值
	 * @param array  $validateVal  需要验证的自动以及验证的方法
	 */
	public static function run($data,$validateVal,$attribute,$modelAction,$model){
		self::$data = $data;
		self::$attribute = $attribute;
		self::$validateVal = $validateVal;
		self::$modelAction = $modelAction;
		self::$model = $model;
		
		if(count($validateVal)<2){
			debug::pause('模型验证规则填写有误');
		}
		$field = explode(',', $validateVal[0]);
		$validate = $validateVal[1];
		foreach ($field as $val){
			self::$validate($val);
		}
	}
	
	
	//必须不能为空
	private static  function required ($val){
		if(isset(self::$validateVal[3]) && is_array(self::$validateVal[3])){
			if(!in_array(self::$modelAction, self::$validateVal[3])){
				return ;//应用操作
			}
		}
		if(self::issetVal($val)){
			if(!empty(self::$data[$val])){
				return true;
			}else{
				if(isset(self::$validateVal[2])){
					self::$msg[] =  self::$validateVal[2];
				}else{
					self::$msg[] =  self::$attribute[$val].'不能为空';
				}
				
			}
		}
	}
	
	
	//整型
	private static function number($val){
		if(isset(self::$validateVal[3]) && is_array(self::$validateVal[3])){
			if(!in_array(self::$modelAction, self::$validateVal[3])){
				return ;//应用操作
			}
		}
		if(self::issetVal($val)){
			if(is_numeric(self::$data[$val])){
				return true;
			}else{
				if(isset(self::$validateVal[2])){
					self::$msg[] =  self::$validateVal[2];
				}else{
					self::$msg[] =  self::$attribute[$val].'不是整型';
				}
			}
		}
	}
	
	
	//范围
	private static function inarray($val){
		if(self::issetVal($val)){
			if(isset(self::$validateVal[2])){
				if(in_array(self::$data[$val], self::$validateVal[2])){
					return true;
				}else{
					if(isset(self::$validateVal[3])){
						self::$msg[] =  self::$validateVal[3];
					}else{
						self::$msg[] =  self::$attribute[$val].'不在规定范围内';
					}
				}
			}else{
				self::$msg[] =  '请填写inarray的范围';
			}
		}
	}
	
	
	//正则表达式
	private static function regular($val){
		if(self::issetVal($val)){
			if(isset(self::$validateVal[2])){
				if(preg_match(self::$validateVal[2],self::$data[$val])){
					return true;
				}else{
					if(isset(self::$validateVal[3])){
						self::$msg[] =  self::$validateVal[3];
					}else{
						self::$msg[] =  self::$attribute[$val].'匹配错误';
					}
				}
			}else{
				self::$msg[] =  '请填写正则表达式';
			}
		}
	}
	
	
	//大于
	private static function max($val){
		if(self::issetVal($val)){
			if(isset(self::$validateVal[2])){
				if(self::$validateVal[2]>self::$data[$val]){
					return true;
				}else{
					if(isset(self::$validateVal[3])){
						self::$msg[] =  self::$validateVal[3];
					}else{
						self::$msg[] =  self::$attribute[$val].'不能大于'.self::$validateVal[2];
					}
				}
			}else{
				self::$msg[] =  '请填写最大的数值';
			}
		}
	}
	
	
	//小于
	private static function min($val){
		if(self::issetVal($val)){
			if(isset(self::$validateVal[2])){
				if(self::$validateVal[2]<self::$data[$val]){
					return true;
				}else{
					if(isset(self::$validateVal[3])){
						self::$msg[] =  self::$validateVal[3];
					}else{
						self::$msg[] =  self::$attribute[$val].'不能小于'.self::$validateVal[2];
					}
				}
			}else{
				self::$msg[] =  '请填写最小的数值';
			}
		}
	}
	
	
	//邮箱
	private static function email($val){
		if(self::issetVal($val)){
			$rules= "/\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/";
			if(preg_match($rules,self::$data[$val])){
				return true;
			}else{
				if(isset(self::$validateVal[2])){
					self::$msg[] =  self::$validateVal[2];
				}else{
					self::$msg[] =  '邮箱格式错误';
				}
			}
		}
	}
	
	
	private static function one($val){
		$condition = '';
		if(isset(self::$validateVal[3]) && is_array(self::$validateVal[3])){
			if(!in_array(self::$modelAction, self::$validateVal[3])){
				return ;//应用操作
			}
		}
		
		if(isset(self::$validateVal[4]) && self::$modelAction=='update'){
			$condition = " and ".self::$validateVal[4]."!='".self::$data[self::$validateVal[4]]."'";
		}
		if(self::issetVal($val)){
			$result = self::$model->find($val."='".self::$data[$val]."' ".$condition);
			if(empty($result)){
				return true;
			}else{
				if(isset(self::$validateVal[2])){
					self::$msg[] =  self::$validateVal[2];
				}else{
					self::$msg[] =  '已经存在，不能重复';
				}
			}
		}
	}
	
	
	public static  function getMsg(){
		return self::$msg;
	}
}
<?php
/**
 * 视图工厂类
* @author lijinhuan
* @link   http://www.lijinhuan.com
*/
class tpl {
	private static $obj = null;
	
	private function __construct(){
		
	}
	
	
	public static function getInstance($var){
		
		if(empty($var) || (isset($var['type']) && $var['type']=='smarty')){
			include FIREZP_PATH.'driver/tpl/smarty/Smarty.class.php';
			$smarty = new Smarty;
			$theme = isset($var['theme'])?$var['theme']:'default';
			$cache = isset($var['cache'])?$var['cache']:false;
			$cachetime = isset($var['cachetime'])?$var['cachetime']:3600;
			$left_delimiter = isset($var['left_delimiter'])?$var['left_delimiter']:'{';
			$right_delimiter = isset($var['right_delimiter'])?$var['right_delimiter']:'}';
			$smarty->template_dir = APP_PATH.'view/'.$theme.'/';
			$smarty->compile_dir = APP_PATH.'runtime/temp/';
			$smarty->cache_dir = APP_PATH.'runtime/cache/tpl/';
			$smarty->caching = $cache;
			$smarty->cache_lifetime = $cachetime;
			$smarty->left_delimiter = $left_delimiter;
			$smarty->right_delimiter = $right_delimiter;
			self::$obj = $smarty;
		}else{
		
			//扩展
		}
		
		return self::$obj;
	}
	
}
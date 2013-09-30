<?php
/**
 * 路由解析器
* @author lijinhuan
* @link   http://www.lijinhuan.com
*/
class parseUrl {
	
	public static function run(){
		if(isset($_SERVER['PATH_INFO'])){
			$pathInfo = trim($_SERVER['PATH_INFO'],'/');
			$params = explode('/', $pathInfo);
			if(isset($params[0]) && !empty($params[0])){
				$_GET['c'] = $params[0];
			}else{
				$_GET['c'] = 'index';
			}
			if(isset($params[1]) && !empty($params[1])){
				$_GET['a'] = $params[1];
			}else{
				$_GET['a'] = 'index';
			}
			if(count($params)>2){
				array_shift($params);
				array_shift($params);
				for ($i=0;$i<count($params);$i=$i+2){
					$_GET[$params[$i]] = isset($params[$i+1])?$params[$i+1]:'';
				}
			}
		}else{
			$_GET['c'] = isset($_GET['c']) && !empty($_GET['c'])?$_GET['c']:'index';
			$_GET['a'] = isset($_GET['a']) && !empty($_GET['a'])?$_GET['a']:'index';
		}
	}
	
}
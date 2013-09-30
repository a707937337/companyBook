<?php
//变量调试
function dump(){
	$args = func_get_args();
	if(count($args)<1){
		debug::add('dump函数没有传入需要调试的参数');
	}else{
		foreach ($args as $val){
			echo '<div style="width:100%;text-align:left;padding-left:50px;"><pre>';
			print_r($val);
			echo '</pre></div>';
		}
	}
}


/**
 * 字符串转义
 * @param $string
 * @return mixed
 */
function new_addslashes($string){
	if(!is_array($string)) return addslashes($string);
	foreach($string as $key => $val) $string[$key] = new_addslashes($val);
	return $string;
}


//获取配置值
function C($var=''){
	static $config = array();
	if(is_array($var)){
		$config = $var;
		return $config;
	}else{
		if(empty($var)){
			return $config;
		}
		if(isset($config[$var])){
			return $config[$var];
		}else{
			return null;
		}
	}

}


/**
 * 实例化模型类
 */
function M($table){
	static $modelArray = array();
	if(isset($modelArray[$table])){
		return $modelArray[$table];
	}else{
		if(file_exists(APP_PATH.'model'.DIRECTORY_SEPARATOR.$table.'Model.php')){
			$model =  $table.'Model';
			$model =  new $model;
			$modelArray[$table] = $model;
		}else{
			$model = new model();
			//设置表名
			$model->table = $table;
			//获取属性绑定
			$attribute = array();
			$colums = $model->findAllBySql("select COLUMN_NAME from information_schema.columns where table_name='{$model->pre}{$model->table}'");
			foreach ($colums as $val){
				$attribute[$val['COLUMN_NAME']] = $val['COLUMN_NAME'];
			}
			$model->attributes = $attribute;
			$modelArray[$table] = $model;
		}
		return $model;
	}
	
}


/**
 * 返回核心类对象
 */
function fpBase($name){
	static $classArray = array();
	if(isset($classArray[$name])){
		return $classArray[$name];
	}else{
		$class =  new $name;	
		$classArray[$name] = $class ;
		return $class;
	}
	
}


/**
 * 返回核心类对象
 */
function fpClass($name){
	static $libArray = array();
	if(isset($libArray[$name])){
		return $libArray[$name];
	}else{
		if(file_exists(APP_PATH.'extlib/'.$name.'.class.php')){
			include_once(APP_PATH.'extlib/'.$name.'.class.php');
		}else if(file_exists(FIREZP_PATH.'lib/'.$name.'.class.php')){
			include_once(FIREZP_PATH.'lib/'.$name.'.class.php');
		}else{
			debug::pause($name.'.class.php 文件不存在');
		}
		$class =  new $name;	
		$libArray[$name] = $class ;
		return $class;
	}
	
}

/**
 * 获取当前页面完整URL地址
 */
function get_url() {
	$sys_protocal = isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://';
	$php_self = $_SERVER['PHP_SELF'] ? safe_replace($_SERVER['PHP_SELF']) : safe_replace($_SERVER['SCRIPT_NAME']);
	$path_info = isset($_SERVER['PATH_INFO']) ? safe_replace($_SERVER['PATH_INFO']) : '';
	$relate_url = isset($_SERVER['REQUEST_URI']) ? safe_replace($_SERVER['REQUEST_URI']) : $php_self.(isset($_SERVER['QUERY_STRING']) ? '?'.safe_replace($_SERVER['QUERY_STRING']) : $path_info);
	return $sys_protocal.(isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '').$relate_url;
}

/*
 * 获取phpself
*/
function get_php_self(){
	$php_self = '';
	$script_name = basename($_SERVER['SCRIPT_FILENAME']);
	if(basename($_SERVER['SCRIPT_NAME']) === $script_name)
		$php_self = $_SERVER['SCRIPT_NAME'];
	else if(basename($_SERVER['PHP_SELF']) === $script_name)
		$php_self = $_SERVER['PHP_SELF'];
	else if(isset($_SERVER['ORIG_SCRIPT_NAME']) && basename($_SERVER['ORIG_SCRIPT_NAME']) === $script_name)
		$php_self = $_SERVER['ORIG_SCRIPT_NAME'];
	else if(($pos = strpos($_SERVER['PHP_SELF'],'/'.$script_name)) !== false)
		$php_self = substr($_SERVER['SCRIPT_NAME'],0,$pos).'/'.$script_name;
	else if(isset($_SERVER['DOCUMENT_ROOT']) && strpos($_SERVER['SCRIPT_FILENAME'],$_SERVER['DOCUMENT_ROOT']) === 0)
		$php_self = str_replace('\\','/',str_replace($_SERVER['DOCUMENT_ROOT'],'',$_SERVER['SCRIPT_FILENAME']));
	else
		return false;
	return $php_self;
}


/**
 * get client IP
 * @return string
 */
function get_client_ip(){
	$ip = $_SERVER['REMOTE_ADDR'];
	if (isset($_SERVER['HTTP_CLIENT_IP']) && preg_match('/^([0-9]{1,3}\.){3}[0-9]{1,3}$/', $_SERVER['HTTP_CLIENT_IP'])){
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	}elseif(isset($_SERVER['HTTP_X_FORWARDED_FOR']) && preg_match_all('#\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}#s', $_SERVER['HTTP_X_FORWARDED_FOR'], $matches)){
		foreach ($matches[0] as $xip){
			if (!preg_match('#^(10|172\.16|192\.168)\.#', $xip)){
				$ip = $xip;
				break;
			}
		}
	}
	return $ip;
}


/**
 * 安全过滤函数
 *
 * @param $string
 * @return string
 */
function safe_replace($string) {
	$string = str_replace('%20','',$string);
	$string = str_replace('%27','',$string);
	$string = str_replace('%2527','',$string);
	$string = str_replace('*','',$string);
	$string = str_replace('"','&quot;',$string);
	$string = str_replace("'",'',$string);
	$string = str_replace('"','',$string);
	$string = str_replace(';','',$string);
	$string = str_replace('<','&lt;',$string);
	$string = str_replace('>','&gt;',$string);
	$string = str_replace("{",'',$string);
	$string = str_replace('}','',$string);
	$string = str_replace('\\','',$string);
	return $string;
}

/**
 * 设置cookie
 * @param string $var
 * @param string $value
 * @param int $life
 * @param bool $prefix
 * @param bool $http_only
 * @return void
 */
function set_cookie($var, $value = '', $life = 0, $prefix = true, $http_only = false){
	$config = array();
	$config = C('cookie');
	$config['cookiepre']  = isset($config['cookiepre'])?$config['cookiepre']:'';
	$config['cookiepath']  = isset($config['cookiepath'])?$config['cookiepath']:'/';
	$config['cookiedomain']  = isset($config['cookiedomain'])?$config['cookiedomain']:'';
	$var = ($prefix ? $config['cookiepre'] : '').$var;
	if($value == '' || $life < 0){
		$value = '';
		$life = -1;
	}
	$life = $life > 0 ? time() + $life : ($life < 0 ? time() - 31536000 : 0);
	$path = $http_only && PHP_VERSION < '5.2.0' ? $config['cookiepath'].'; HttpOnly' : $config['cookiepath'];

	$secure = $_SERVER['SERVER_PORT'] == 443 ? 1 : 0;
	if(PHP_VERSION < '5.2.0'){
		setcookie($var,sys_auth($value), $life, $path, $config['cookiedomain'], $secure);
	}else{
		setcookie($var,sys_auth($value), $life, $path, $config['cookiedomain'], $secure, $http_only);
	}
}

/*
 * 获取cookie
*/
function get_cookie($key) {
	$config = array();
	$config = C('cookie');
	$config['cookiepre']  = isset($config['cookiepre'])?$config['cookiepre']:'';
	$val =  isset($_COOKIE[$config['cookiepre'].$key]) ? $_COOKIE[$config['cookiepre'].$key] : '';
	return sys_auth($val,'DECODE');
}


/**
 * 字符串加密、解密函数
 *
 *
 * @param	string	$txt		字符串
 * @param	string	$operation	ENCODE为加密，DECODE为解密，可选参数，默认为ENCODE，
 * @param	string	$key		密钥：数字、字母、下划线
 * @param	string	$expiry		过期时间
 * @return	string
 */
function sys_auth($string, $operation = 'ENCODE', $key = '', $expiry = 0) {
	$key_length = 4;
	$key = md5($key != '' ? $key : C('autokey'));
	$fixedkey = hash('md5', $key);
	$egiskeys = md5(substr($fixedkey, 16, 16));
	$runtokey = $key_length ? ($operation == 'ENCODE' ? substr(hash('md5', microtime(true)), -$key_length) : substr($string, 0, $key_length)) : '';
	$keys = hash('md5', substr($runtokey, 0, 16) . substr($fixedkey, 0, 16) . substr($runtokey, 16) . substr($fixedkey, 16));
	$string = $operation == 'ENCODE' ? sprintf('%010d', $expiry ? $expiry + time() : 0).substr(md5($string.$egiskeys), 0, 16) . $string : base64_decode(substr($string, $key_length));

	$i = 0; $result = '';
	$string_length = strlen($string);
	for ($i = 0; $i < $string_length; $i++){
		$result .= chr(ord($string{$i}) ^ ord($keys{$i % 32}));
	}
	if($operation == 'ENCODE') {
		return $runtokey . str_replace('=', '', base64_encode($result));
	} else {
		if((substr($result, 0, 10) == 0 || substr($result, 0, 10) - time() > 0) && substr($result, 10, 16) == substr(md5(substr($result, 26).$egiskeys), 0, 16)) {
			return substr($result, 26);
		} else {
			return '';
		}
	}
}



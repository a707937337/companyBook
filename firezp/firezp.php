<?php
/**
 * 框架入口文件，基础的东西都在这
 * @author lijinhuan
 * @link   http://www.lijinhuan.com
 */
class firezpBase{
	
	
	/**
	 * 入口方法
	 * @param array $config 项目简单配置
	 */
    public static function run($config){
		//初始化设置
		self::init();
		//定义系统常量
		self::define($config);
		//包含框架中的函数库文件
		require FIREZP_PATH.'common'.DIRECTORY_SEPARATOR.'function.inc.php';
		//加载所有配置
		if(file_exists(APP_PATH.'conf'.DIRECTORY_SEPARATOR.'confing.inc.php')){
			$appConfig = require  APP_PATH.'conf'.DIRECTORY_SEPARATOR.'confing.inc.php';
			$sysConfig = array('page'=>8);//系统配置
			$config = array_merge($sysConfig,$appConfig,$config);
		}
		C($config);
		//系统url
		self::initUrl();
		//设置自动加载类
		spl_autoload_register(array('self','autoload'));
		//设置包含目录（类所在的全部目录）,  PATH_SEPARATOR 分隔符号 Linux(:) Windows(;)
		$include_path=get_include_path();                         //原基目录
		$include_path.=PATH_SEPARATOR.FIREZP_PATH."base/";       //框架中基类所在的目录
		set_include_path($include_path);
		//调试开始
		debug::debugbegin();
		//项目结构化
		appStruct::make();
		//url解析		
		parseUrl::run();
		//安全过滤
		self::safe();
		//开始session
		session_start();
		//实例化控制器
		$controllerFile = APP_PATH."controller".DIRECTORY_SEPARATOR.strtolower($_GET["c"])."Controller.php";
		define('CONTROLLER', $_GET["c"]);
		define('ACTION', $_GET["a"]);
		if(file_exists($controllerFile)){
			$controller =  $_GET["c"]."Controller";
			$controllerObj   = new $controller();
			$action = $_GET["a"]."Action";
			if(method_exists($controllerObj, $action)){
				$controllerObj->$action();
			}else{
				debug::add($action.'方法不存在');
			}
		}else{
			debug::add('控制器不存在');
		}
		//输出调试信息
		if(DEBUG==1){
			debug::debugend();
			debug::show();
		}
	}
	
	
	/**
	 * 自动加载类
	 */
	public static function autoload($className){
		if(isset(self::$baseClass[$className])){
			include(self::$baseClass[$className]);
		}else{
			if(strpos($className, 'Controller')!==false){
				include(APP_PATH.'controller'.DIRECTORY_SEPARATOR.$className.'.php');
			}else if(strpos($className, 'Model')!==false){
				if(file_exists(APP_PATH.'model'.DIRECTORY_SEPARATOR.$className.'.php')){
					include(APP_PATH.'model'.DIRECTORY_SEPARATOR.$className.'.php');
				}else{
					debug::pause('模型'.$className.'不存在！');
				}
				
			}
		}
		
	} 
	
	
	private static  function safe(){
		foreach ($GLOBALS as $key => $value) {
			if(!in_array($key,array('_POST','_GET','_COOKIE','_SERVER','_COOKIE','_FILES'))){
				$GLOBALS[$key] = null;
				unset($GLOBALS[$key]);
			}
		}
		if(phpversion() < '5.3.0'){set_magic_quotes_runtime(0);}
		define('MAGIC_QUOTES_GPC', function_exists('get_magic_quotes_gpc') && get_magic_quotes_gpc());
		if (isset($_GET['GLOBALS']) || isset($_POST['GLOBALS']) || isset($_COOKIE['GLOBALS']) || isset($_FILES['GLOBALS'])){
			debug::pause('global error');
		}
		if(!MAGIC_QUOTES_GPC){
			$_POST = new_addslashes($_POST);
			$_GET = new_addslashes($_GET);
			$_REQUEST = isset($_REQUEST)?new_addslashes($_REQUEST):'';
			$_COOKIE = new_addslashes($_COOKIE);
		}
	}
	
	/**
	 * 定义系统常量
	 */
	private static function define($config){
		if(!isset($config['app'])){debug::pause('项目没有定义,请在引用文件添加代码如   $appHomeConf=array("app"=>"/app");firezp::run($appHomeConf);');}
		if(isset($config['debug']) && $config['debug']==1){define('DEBUG', 1);}else{define('DEBUG', 0);}
		define('FIREZP_PATH',dirname(__FILE__).DIRECTORY_SEPARATOR);//框架应用路径
		define("APP_PATH", dirname($_SERVER['SCRIPT_FILENAME']).DIRECTORY_SEPARATOR.ltrim($config['app'],'/').DIRECTORY_SEPARATOR);//用户项目的应用路径
		define("ROOT_PATH", dirname(FIREZP_PATH).DIRECTORY_SEPARATOR);  //项目的根路径，也就是框架所在的目录
	}
	
	
	/**
	 * 定义系统url
	 */
	private  static function initUrl(){
		$appPath = trim(C('app'),'/');
		define('NOW_URL',htmlspecialchars(get_url()));
		define('PHP_SELF_URL',get_php_self());
		$site_path = substr(PHP_SELF_URL, 0, strrpos(PHP_SELF_URL, '/'));
		define('SITE_URL', htmlspecialchars('http://'.$_SERVER['HTTP_HOST'].$site_path.'/'));
		define('CSS_PATH', SITE_URL.$appPath.'/statics/css/');
		define('JS_PATH', SITE_URL.$appPath.'/statics/js/');
		define('IMAGE_PATH', SITE_URL.$appPath.'/statics/images/');
		define('STATICS_PATH', SITE_URL.$appPath.'/statics/');
	}
	
	/**
	 * 初始化相关
	 */
	private static function init(){
		header("Content-Type:text/html;charset=utf-8");  //设置系统的输出字符为utf-8
		date_default_timezone_set("PRC");    		 //设置时区（中国）
	}
	
	
	/**
	 * 自动加载核心的类
	 */
	private static $baseClass = array(
			'appStruct' => 'appStruct.class.php',
			'parseUrl' => 'parseUrl.class.php',
			'controller' => 'controller.class.php',
			'debug' => 'debug.class.php',
			'tpl' => 'tpl.class.php',
			'model' => 'model.class.php',
			'validate' => 'validate.class.php',
			'cache' => 'cache.class.php',
			'http' => 'http.class.php',
	);
	
	
	
}


/**
 * 需要扩展入口程序可以在这里
 * @author lijinhuan
 * @link   http://www.lijinhuan.com
 */
class firezp extends firezpBase{}
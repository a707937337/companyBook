<?php
/**
 * 应用程序目录初始化
 * @author lijinhuan
 * @link   http://www.lijinhuan.com
 */
class appStruct{
   static $message = array();    //提示消息
	
   /**
	*  创建目录
	* @param	string	$dirs		需要创建的目录名称
	*/
	static function mkdir($dirs){
		foreach($dirs as $dir){
			if(!file_exists($dir)){
				if(mkdir($dir,"0755")){
					self::$message[]="创建目录 {$dir} 成功.";
				}
			}
		}
	}
	
	
	/**
	 * 项目结构化
	 */
	public static function make(){
		//runtime在所有项目的公共地方
		self::mkdir(array(APP_PATH,APP_PATH.'runtime/',APP_PATH,APP_PATH.'extlib/',APP_PATH.'runtime/cache/',APP_PATH.'runtime/cache/tpl',APP_PATH.'runtime/temp/',APP_PATH.'statics/',APP_PATH.'statics/js/',APP_PATH.'statics/images/',APP_PATH.'statics/css/'));
		$flagFile =  APP_PATH."runtime/flag.php"; 
		if(!file_exists($flagFile)){
			$uuid = uniqid(); 
			//生成目录
			self::mkdir(array(APP_PATH.'conf/',APP_PATH.'controller/',APP_PATH.'model/',APP_PATH.'view/',APP_PATH.'view/default',APP_PATH.'common/'));
			$funcStr=<<<MARK
<?php
        //你可以在该文件定义自己的函数
			
				
					
?>
MARK;
			if(!file_exists(APP_PATH.'common/function.inc.php')){
				file_put_contents(APP_PATH.'common/function.inc.php',$funcStr);
			}
		
			$confStr=<<<conf
<?php
        return array(
					
			//你可以在这里进行配置		
			'autokey' => '{$uuid}',//不能删除全站唯一识别id				
					
					
		);
			
		
?>
conf;
			if(!file_exists(APP_PATH.'conf/confing.inc.php')){
				file_put_contents(APP_PATH.'conf/confing.inc.php',$confStr);
			}
			
			$controllerfStr=<<<action
<?php
/**
 * index控制器
 */   
class indexController extends controller {
		
	public function indexAction(){
		echo '欢迎使用firezp框架！';
	}
		
}
		
			
?>
action;
			if(!file_exists(APP_PATH.'controller/indexController.php')){
				file_put_contents(APP_PATH.'controller/indexController.php',$controllerfStr);
			}
			file_put_contents($flagFile, '');
			
		}else{
			//uuid存在判断
			if(!C('autokey')){
				debug::pause("请在配置文件配置全站uuid，格式如   'autokey'=>'这里可以随便你填'");
			}
		} 
	}
	
	
	
}



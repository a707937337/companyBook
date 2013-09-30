<?php
/**
 * debug；类
 * @author lijinhuan
 * @link   http://www.lijinhuan.com
 */
class debug{
	private static $info = array();
	private static $stime = null;
	private static $etime = null;
	private static $begintime = null;
	private static $endtime = null;
	private static $includefiles = array();
	private static $memory = null;
	
	//脚本开始处执行该方法，用于定义开始时间
	public static function start(){
		self::$stime = microtime(TRUE);
	}  
	
	
	//脚本结束处执行该函数，用于记录脚本执行时间
	public static function end(){
		self::$etime = microtime(TRUE);
	}
	
	
	//脚本开始处执行该方法，用于定义开始时间
	public static function debugbegin(){
		self::$begintime = microtime(TRUE);
	}
	
	
	//脚本结束处执行该函数，用于记录脚本执行时间
	public static function debugend(){
		self::$endtime = microtime(TRUE);
	}
	
	//计算脚本执行时间
	public  static function spent(){
		$time =  round(self::$etime-self::$stime,4);//以四舍五入法保留四位
		if ($time>1) {
			return '<font color="red">'.$time.'秒</font>';
		}else{
			return '<font color="red">'.$time*1000 .'毫秒</font>';
		}
	}
	
	//计算脚本执行时间
	private  static function spentall(){
		$time =  round(self::$endtime-self::$begintime ,4);//以四舍五入法保留四位
		if ($time>1) {
			return $time.'秒';
		}else{
			return $time*1000 .'毫秒';
		}
	}
	
	
	public static function pause($msg){
		echo '<div style="border:2px solid red;background:lightyellow;line-height:60px;text-align:center;">';
		echo 'firezp框架提示: '.$msg;
		exit('</div>');
	} 
	
	
	public static function add($msg,$type=0){
		if(defined('DEBUG') && DEBUG==1){
			switch ($type){
				case 0:
					self::$info['error'][] = $msg;
					break;
				case 1:
					self::$info['sql'][] = $msg;
					break;
			}
		}
	}
	
	//内存使用
	private static function memory_get_usage(){
		self::$memory = round(memory_get_usage()/1024,2) .'kb';
	}
	
	//包含文件
	private static function getincludefile(){
		self::$includefiles = get_included_files();
	}
	
	public static function show(){
		self::getincludefile();
		self::memory_get_usage();
		echo '<hr/>';
		echo '系统运行时间：'.self::spentall().'，内存 ：'.self::$memory .'<br/>';
		echo '<hr/>';
		foreach (self::$info as $key=>$val){
			echo $key.'信息：<br/>';
			echo '<pre>';
			foreach($val as $k=>$v){
				echo "[$k] ".$v.'<br/>';
			}
			echo '</pre>';
			echo '<hr/>';
		}
		
		if(count(self::$includefiles) > 0){
			echo '包含文件信息:<br/><br/>';
			foreach(self::$includefiles as $kf=>$file){
				echo "[$kf]".$file.'<br/>';
			}
		}
		
	}
}
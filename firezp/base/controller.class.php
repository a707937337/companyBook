<?php
/**
 * 公共控制器
 * @author lijinhuan
 * @link   http://www.lijinhuan.com
 */
class controller{
	public $tpl;
	
	
	public function __construct(){
		//视图初始化
		$this->tpl = tpl::getInstance(C('tpl'));
		//预留初始化
		if(method_exists($this,'init')){
			$this->init();
		}
		
	}
	
	
	public function assign($key,$val,$flag=false){
		
		
		$this->tpl->assign($key,$val,$flag);
	}
	
	
	public function display($name=''){
		$tpl = C('tpl');
		$tplarr = is_array($tpl)?'':C('tpl');
		$suffix = isset($tplarr['suffix'])?$tplarr['suffix']:'.html';
		if(empty($name)){$name=$_GET['a'];}
		$this->tpl->display($_GET['c'].'/'.$name.$suffix);
	}
	
	
	/**
	 * URL重定向
	 * @param string $url 重定向的URL地址
	 * @param integer $time 重定向的等待时间（秒）
	 * @param string $msg 重定向前的提示信息
	 * @return void
	 */
	function redirect($url, $time=0, $msg='') {
	    //多行URL地址支持
	    $url        = str_replace(array("\n", "\r"), '', $url);
	    if (empty($msg))
	        $msg    = "系统将在{$time}秒之后自动跳转到{$url}！";
	    if (!headers_sent()) {
	        // redirect
	        if (0 === $time) {
	            header('Location: ' . $url);
	        } else {
	            header("refresh:{$time};url={$url}");
	            echo($msg);
	        }
	        exit();
	    } else {
	        $str    = "<meta http-equiv='Refresh' content='{$time};URL={$url}'>";
	        if ($time != 0)
	            $str .= $msg;
	        exit($str);
	    }
	}
	
	
	/**
	 * 信息提示
	 * @param string $message
	 * @param number $time
	 * @param string $url
	 * @param int $type 1为正确，2为提示，3为问号，0为错误
	 */
	public function showMessage($message='成功',$time=1,$url=false,$type=2){
		if(is_array($url)){
			$route=isset($url[0]) ? $url[0] : '';
			$url=$this->createUrl($route,array_splice($url,1));
		}
		if ($url){
			$url = "window.location.href='{$url}'";
		}else{
			$url = "history.back();";
		}
		echo <<<HTML
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>提示：{$message}</title>
   <style>
   		a.a0{color:red}
   		a.a1{color:green}
   		a.a2{color:blue}
   		a.a3{color:black}
   </style>
</head>
<body>
	<div class="div_pop_box wd427 jump">
        <div class="border_top"></div>
        <div class="border_coverbd">
            <div class="div_pop_box_cont">
            	<div class="info">
                	
                    <span class="cont" style="text-indent:20px;"><a class="img a{$type}">{$message}</a></span>
				</div>
				<div class="pro"><b id="sec">{$time}</b>秒后自动跳转...</div>
            </div>
        </div>
        <div class="border_bottom"></div>
    </div>
	<script type="text/javascript">
		function run(){
			var s = document.getElementById("sec");
				if(s.innerHTML == 0){
					{$url}
					return false;
				}
				s.innerHTML = s.innerHTML * 1 - 1;
		}
		window.setInterval("run();", 1000);
	</script>
</body>
</html>
	
HTML;
						exit();
	}
}
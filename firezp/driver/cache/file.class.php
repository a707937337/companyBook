<?php
/*
 * 文件缓存类
*/
class file{
	private static $instance;
	
	/*
	 * 禁止对象直接实例化，实现单例模式
	*/
	private function __construct(){
		
	}
	
	/*
	 * 只能通过该方法获取mysql对象
	*/
	static public function get_instance(){
		if(self::$instance==null){
			self::$instance=new self();
		}
		return self::$instance;
	}
	
	
	public function write($key,$val,$time=0){
		$data = array();
		$data['time'] = $time;
		$data['now'] = time();
		$data['val'] = $val;
		$data = base64_encode(serialize($data));
		$data =<<<mark
<?php return '$data'; ?>
mark;
		file_put_contents(APP_PATH.'runtime/temp/'.md5($key).'.php', $data);
	}
	
	
	public function read($key){
		$file = APP_PATH.'runtime/temp/'.md5($key).'.php';
		if(file_exists($file)){
			$data = include $file;
			$data = unserialize(base64_decode($data));
			if($data['time']!=0){
				if(time()-$data['now']>$data['time']){
					@unlink($file);
					return null;
				}
			}
			return $data['val'];
			return null;
		}else{
			return null;
		}
	}
	
	
	public function delete($key){
		$file = APP_PATH.'runtime/temp/'.md5($key).'.php';
		if(file_exists($file)){
			@unlink($file);
		}
	}
	
	//清空所有缓存
	public function flush(){
		foreach(glob(APP_PATH.'runtime/temp/*.php') as $file){
			@unlink($file);
		}
		
	}
}
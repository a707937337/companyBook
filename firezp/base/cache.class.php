<?php
/**
 * 缓存工厂
 * @author lijinhuan
 * @link   http://www.lijinhuan.com
 */
class cache {
	private  $cache;
	
	public function __construct(){
		$this->cache = $this->cache_obj(C('cache'));
	}
	
	
	/**
	 * 获取缓存实例
	 */
	private function cache_obj($drive=array('type'=>'file')){
		if(isset($drive['type'])){
			$drive = $drive['type'];
		}else{
			$drive = 'file';
		}
		if(empty($this->cache)){
			include_once FIREZP_PATH.'driver/cache/'.$drive.'.class.php';
			eval('$this->cache='.$drive.'::get_instance();');
		}
		return $this->cache;
	}
	
	
	
	
	public  function write($key,$val,$time=0){
		
		$this->cache->write($key,$val,$time);
	}
	
	
	public  function read($key){
	
		return $this->cache->read($key);
	}
	
	
	public function delete($key){
		$this->cache->delete($key);
	}
	
	
	//清空所有缓存
	public function flush(){
		$this->cache->flush();
	}
	
}

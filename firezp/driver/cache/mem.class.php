<?php
class mem
{
	private  $obj;

	private static $instance;
	
	/*
	 * 禁止对象直接实例化，实现单例模式
	*/
	private function __construct(){
		$conf = C('cache');
		if(!isset($conf['server'])){debug::pause('请填写memcache server地址');}
		if(!isset($conf['port'])){debug::pause('请填写memcache port地址');}
		if(!isset($conf['pconnect'])){$conf['pconnect'] = 0;}
		$this->init($conf);
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
	
	
	public function init($config) {
		if(!extension_loaded('Memcache')){
			debug::pause('memcache扩展没有安装');
		}
		if(!empty($config['server'])) {
			$this->obj = new Memcache;
			if($config['pconnect']) {
				$connect = @$this->obj->pconnect($config['server'], $config['port']);
			} else {
				$connect = @$this->obj->connect($config['server'], $config['port']);
			}
			if(!$connect){
				debug::pause('memcache 无法连接');
			}
		}
	}

	public function read($key) {
		return $this->obj->get($key);
	}

	
	/**
	 * 写入
	 * @param unknown $key
	 * @param unknown $value
	 * @param number $ttl
	 * @return boolean
	 */
	public function write($key, $value, $time = 0) {
		return $this->obj->set($key, $value, MEMCACHE_COMPRESSED, $time);
	}

	/**
	 * 删除指定的值
	 * @param unknown $key
	 * @return boolean
	 */
	public function delete($key) {
		return $this->obj->delete($key);
	}

	/**
	 * 删除全部
	 * @return boolean
	 */
	public function flush() {
		return $this->obj->flush();
	}

	
}

?>


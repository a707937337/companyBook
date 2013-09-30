<?php
/*
 * mysql操作类
 */
class mysql{
	public $curlink;
	public $version = null;
	private static $instance;
	
	
	
	/*
	 * 禁止对象直接实例化，实现单例模式
	 */
	private function __construct(){
		$conf = C('db');
		if(!isset($conf['host'])){debug::pause('请填写数据库host地址');}
		if(!isset($conf['user'])){debug::pause('请填写数据库用户名');}
		if(!isset($conf['password'])){debug::pause('请填写数据库密码');}
		if(!isset($conf['name'])){debug::pause('请填写数据库名称');}
		if(!isset($conf['pconnect'])){$pconnect = 0;}
		$this->curlink	= $this->db_connect($conf['host'], $conf['user'], $conf['password'], 'utf8', $conf['name'], $pconnect);
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
	
	

	
	/*
	 * 正式链接数据库 
	 */
	public function db_connect($dbhost, $dbuser, $dbpwd, $dbcharset, $dbname, $pconnect){
		$link = null;
		$func = empty($pconnect) ? 'mysql_connect' : 'mysql_pconnect';
		if(!$link = @$func($dbhost, $dbuser, $dbpwd, 1)){
			debug::pause('mysql do not connect');
		}else{
			$this->curlink = $link;
			if($this->version() > '4.1'){
				$serverset = $dbcharset ? 'character_set_connection='.$dbcharset.', character_set_results='.$dbcharset.', character_set_client=binary' : '';
				$serverset .= $this->version() > '5.0.1' ? ((empty($serverset) ? '' : ',').'sql_mode=\'\'') : '';
				$serverset && mysql_query("SET $serverset", $link);
			}
			if($dbname && !mysql_select_db($dbname, $link)){
				$this->halt($dbname.'数据库不存在');
			}
			
		}
		return $link;	
	}
	
	/*
	 * 错误信息输出
	 */
	function error(){
		return (($this->curlink) ? mysql_error($this->curlink) : mysql_error());
	}
	
	/*
	 * 链接错误信息
	 */
	public function errno(){
		return intval(($this->curlink) ? mysql_errno($this->curlink) : mysql_errno());
	}
	
	/*
	 * 终止，并错误输出
	 */
	public function halt($message = '',$sql = ''){
		if(DEBUG==1){
			debug::add(($message.": <font color='green'>".$sql.'</font>'));
		}else{
			debug::pause(($message.": <font color='green'>".$sql.'</font>'));
		}
	
	}
	
	/*
	 * 获取mysql版本
	 */
	public function version(){
		if(empty($this->version)){
			$this->version = mysql_get_server_info($this->curlink);
		}
		return $this->version;
	}
	
	
	
	/*
	 * 获取一条数据返回数组
	 */
	public function fetch_first($sql){
		
		return $this->fetch_array($this->query($sql));
	}
	
	/*
	 * 返回结果集的一条关联数组
	 */
	public function fetch_array($query, $result_type = MYSQL_ASSOC){
		return mysql_fetch_array($query, $result_type);
	}
	
	/*
	 * 执行查询语句
	 */
	function query($sql, $type = ''){
		$func = $type == 'UNBUFFERED' && @function_exists('mysql_unbuffered_query') ? 'mysql_unbuffered_query' : 'mysql_query';
		if(!($query = $func($sql, $this->curlink))){		
			$this->halt('query_error', $sql);
		}
		$this->query_num++;
		return $query;
	}
	
	/*
	 * 选择数据库
	 */
	function select_db($dbname){
		return mysql_select_db($dbname, $this->curlink);
	}

	/*
	 * 获取所有结果集
	 */
    function fetch_all($sql){
        $res = $this->query($sql);
        if ($res !== false){
            $arr = array();
            while ($row = mysql_fetch_assoc($res)){
                $arr[] = $row;
            }
            return $arr;
        }else{
            return false;
        }
	}
	
	/*
	 * 影响行数
	 */
	function affected_rows(){
		return mysql_affected_rows($this->curlink);
	}
	
	/*
	 * 函数返回结果集中一个字段的值
	 */
	function result($query, $row = 0){
		$query = @mysql_result($query, $row);
		return $query;
	}

	/*
	 * 行
	 */
	function num_rows($query){
		$query = mysql_num_rows($query);
		return $query;
	}

	/*
	 * 字段
	 */
	function num_fields($query){
		return mysql_num_fields($query);
	}

	/*
	 * 释放
	 */
	function free_result($resourceid){
		return mysql_free_result($resourceid);
	}

	/*
	 * 插入id
	 */
	function insert_id(){
		return ($id = mysql_insert_id($this->curlink)) >= 0 ? $id : $this->result($this->query("SELECT last_insert_id()"), 0);
	}

	/*
	 * 索引数组
	 */
	function fetch_row($query){
		$query = mysql_fetch_row($query);
		return $query;
	}

	/*
	 * 字段
	 */
	function fetch_fields($query) {
		return mysql_fetch_field($query);
	}

	/*
	 * 获取第一条结果
	 */
	function result_first($sql){
		return $this->result($this->query($sql), 0);
	}
	
	/*
	 * 关闭资源
	 */
	function close()
	{
		return mysql_close($this->curlink);
	}
	
	/*
	 * 禁止对象被克隆
	 */
	private function __clone(){
		
	}
	
}
	

?>
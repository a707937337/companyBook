<?php
/**
 * 公共模型
 * @author lijinhuan
 * @link   http://www.lijinhuan.com
 */
class model{
	public $pre;
	public $data = array();
	public $table;
	public $attributes = array();
	private $sql = array();
	protected  $db; 
	

	public  function __construct(){
		$dbConf = C('db');
		$this->pre = isset($dbConf['pre'])?$dbConf['pre']:'';
		$this->db = $this->db_obj($dbConf);
		
	}
	
	
	/**
	 * 工厂获取数据库实例
	 */
	protected function db_obj($drive=array('type'=>'mysql')){
		if(isset($drive['type'])){
			$drive = $drive['type'];
		}else{
			$drive = 'mysql';
		}
		if(empty(self::$db)){
			include_once FIREZP_PATH.'driver/db/'.$drive.'.class.php';
			eval('$db='.$drive.'::get_instance();');
		}
		return $db;
	}
	
	
	/**
	 * 添加
	 */
	public function save($saveData=''){
		if(!empty($saveData)){
			$this->data = $saveData;
		}
		$this->checkRules('save');
		$validateMsg = validate::getMsg();
		if(empty($validateMsg)){
			if(is_array($this->data)){
				$data = $this->getData();
				$sql = $this->implode_field_value($data);
			}else{
				$sql = $this->data;
			}
			debug::start();
			$return = $this->query("INSERT INTO {$this->pre}{$this->table} SET $sql");
			debug::end();
			if($return){
				debug::add("INSERT INTO {$this->pre}{$this->table} SET $sql  [".debug::spent()."]",1);
				return $this->insert_id();
			}else{
				return false;
			}
		}else{
			foreach($validateMsg as $val){
				debug::add("对 {$this->pre}{$this->table} 表进行插入操作时验证不通过：".$val);
			}
			return false;
		}
	}
	
	
	/**
	 * 更新
	 */
	public function update($condition=''){
		$this->checkRules('update');
		$validateMsg = validate::getMsg();
		if(empty($validateMsg)){
			if(is_array($this->data)){
				$data = $this->getData();
				$sql = $this->implode_field_value($data);
			}else{
				$sql = $this->data;
			}
			if(empty($condition)){
				$where = '1';
			}elseif(is_array($condition)){
				$condition = $this->getData($condition);
				$where = $this->implode_field_value($condition, ' AND ');
			}else{
				$where = $condition;
			}
			debug::start();
			$res = $this->db->query("UPDATE {$this->pre}{$this->table} SET $sql WHERE $where");
			debug::end();
			debug::add("UPDATE {$this->pre}{$this->table} SET $sql WHERE $where  [".debug::spent()."]",1);
			return $res;
		}else{
			foreach($validateMsg as $val){
				debug::add("对 {$this->pre}{$this->table} 表进行更新操作时验证不通过：".$val);
			}
			return false;
		}
	}
	
	
	
	/**
	 * 删除
	 */
	public function delete($condition='',$limit = 0){
		if(empty($condition)){
			$where = '1';
		}elseif(is_array($condition)){
			$condition = $this->getData($condition);
			$where = $this->implode_field_value($condition, ' AND ');
		}else{
			$where = $condition;
		}
		$sql = "DELETE FROM ".$this->pre.$this->table." WHERE  $where  ".($limit ? " LIMIT $limit" : '');
		debug::start();
		$re  = $this->db->query($sql);
		debug::end();
		debug::add("$sql  [".debug::spent()."]",1);
		return  $re;
	}
	
	
	
	/**
	 * 查找
	 */
	public function findAll($condition='',$field='*',$limit=''){
		if(empty($condition)){
			$where = '1';
		}elseif(is_array($condition)){
			$condition = $this->getData($condition);
			$where = $this->implode_field_value($condition, ' AND ');
		}else{
			$where = $condition;
		} 
		$sql = "SELECT {$field} FROM {$this->pre}{$this->table}  WHERE {$where} ".($limit ? " LIMIT $limit" : '');
		debug::start();
		$re = $this->_execute('fetch_all', $sql);
		debug::end();
		debug::add("$sql  [".debug::spent()."]",1);
		return $re;
	}
	
	
	
	/**
	 * 根据sql查找所有
	 *
	 */
	public  function findAllBySql($sql){
		$this->check_query($sql);
		debug::start();
		$re =  $this->_execute('fetch_all', $sql);
		debug::end();
		debug::add("$sql  [".debug::spent()."]",1);
		return $re;
	}
	
	
	/**
	 * 返回第一条
	 */
	public function find($condition='',$field='*'){
		if(empty($condition)){
			$where = '1';
		}elseif(is_array($condition)){
			$condition = $this->getData($condition);
			$where = $this->implode_field_value($condition, ' AND ');
		}else{
			$where = $condition;
		} 
		$sql = "SELECT {$field} FROM {$this->pre}{$this->table}  WHERE {$where}  LIMIT 1";
		debug::start();
		$re =  $this->_execute('fetch_first', $sql);
		debug::end();
		debug::add("$sql  [".debug::spent()."]",1);
		return $re;
	}
	
	
	/**
	 * 根据sql查找第一条
	 *
	 */
	public  function findBySql($sql){
		$this->check_query($sql);
		debug::start();
		$re =  $this->_execute('fetch_first', $sql);
		debug::end();
		debug::add("$sql  [".debug::spent()."]",1);
		return $re;
	}
	
	
	/**
	 * 取得前一次 MySQL 操作所影响的记录行数(INSERT，UPDATE 或 DELETE )
	 * @return int
	 */
	public  function affected_rows(){
		return $this->_execute('affected_rows');
	}

	/**
	 * 放所有与结果标识符 result 所关联的内存
	 * @return bool
	 */
	public  function free_result($resourceid){
		return $this->_execute('free_result', $resourceid);
	}

	/**
	 * 创建像这样的查询: "IN('a','b')";
	 *
	 * @access   public
	 * @param    mix      $item_list      列表数组或字符串
	 * @param    string   $field_name     字段名称
	 * @return   string
	 */
	public  function create_in($item_list, $field_name = ''){
		if (empty($item_list)){
			return $field_name . " IN ('') ";
		}else{
			if (! is_array($item_list)){
				$item_list = explode(',', $item_list);
			}
			$item_list = array_unique($item_list);
			$item_list_tmp = '';
			foreach ($item_list as $item){
				if ($item !== ''){
					$item_list_tmp .= $item_list_tmp ? ",'$item'" : "'$item'";
				}
			}
			if (empty($item_list_tmp)){
				return $field_name . " IN ('') ";
			}else{
				return $field_name . ' IN (' . $item_list_tmp . ') ';
			}
		}
	}

	
	private function checkRules($modelAction){
		if(method_exists($this, 'rules')){
			$rules = $this->rules();
			if(!empty($rules)){
				foreach ($rules as $val){
					validate::run($this->data,$val,$this->attributes,$modelAction,$this);
				}
			}
		}
	}
	
	
	/**
	 * 过滤输入的字段，只能传数据里面有的内容
	 */
	private function getData($data=''){
		$result = array();
		if(empty($data)){
			$data = $this->data;
		}
		if(is_array($data) && !empty($data)){
			foreach ($data as $key=>$val){
				if(isset($this->attributes[$key])){
					$result[$key] = $val;
				}
			}
		}
		return $result;
	}
	
	
	/**
	 * 查询
	 */
	public  function  query($sql){
		$this->check_query($sql);
		return $this->_execute('query', $sql);
	} 
	
	
	/**
	 * 检测查询是否合法
	 *
	 * @access   private
	 * @param    string $sql  查询语句
	 * @return   bool
	 */
	private  function check_query($sql){
		static $checkcmd = array('SELECT', 'UPDATE', 'INSERT', 'REPLACE', 'DELETE');
		$cmd = trim(strtoupper(substr($sql, 0, strpos($sql, ' '))));
		if(in_array($cmd, $checkcmd)){
			$test = $this->_do_query_safe($sql);
			if($test < 1){
				$this->_execute('halt', 'security_error', $sql);
			}
		}
		return true;
	}
	
	/**
	 * 组合sql
	 */
	private  function implode_field_value($array, $glue = ','){
		$sql = $comma = '';
		foreach ($array as $k => $v){
			$sql .= $comma."`$k`='$v'";
			$comma = $glue;
		}
		return $sql;
	}
	
	
	/**
	 * 从结果集中取得指定单元的内容
	 * @access public
	 * @param  resource $resourceid  结果集
	 * @param  int/string $row  单元索引或者字段名称 默认为0(第一个单元)
	 * @return mixed
	 */
	public  function result($resourceid, $row = 0){
		return $this->_execute('result', $resourceid, $row);
	}

	/**
	 * 根据查询语句获取第一个单元数据
	 * @access public
	 * @param  string $sql  查询语句
	 * @return mixed
	 */
	public  function result_first($sql){
		$this->check_query($sql);
		return $this->_execute('result_first', $sql);
	}
	
	
	/**
	 * 取得结果集行数
	 * @access public
	 * @param  resource $resourceid  结果集(仅对 SELECT 语句有效)
	 * @return int
	 */
	public  function num_rows($resourceid){
		return $this->_execute('num_rows', $resourceid);
	}
	
	/**
	 * 检测查询
	 *
	 * @access   private
	 * @param    string $sql  查询语句
	 * @return   int
	 */
	private  function _do_query_safe($sql){
		static $_CONFIG = null;
		if($_CONFIG === null){
			$_CONFIG =  array(
					'status' => 1,
					'function'	=> array('load_file','hex','substring','ord','char'),
					'action' => array('intooutfile','intodumpfile','unionselect'),
					'note' => array('/*','*/','#','--','"'),
					'likehex' => 1,
					'fullnote' => 1,
			);
		}
		$sql = str_replace(array('\\\\', '\\\'', '\\"', '\'\''), '', $sql);
		$mark = $clean = '';
		if(strpos($sql, '/') === false && strpos($sql, '#') === false && strpos($sql, '-- ') === false) {
			$clean = preg_replace("/'(.+?)'/s", '', $sql);
		} else {
			$len = strlen($sql);
			$mark = $clean = '';
			for ($i = 0; $i <$len; $i++) {
				$str = $sql[$i];
				switch ($str) {
					case '\'':
						if(!$mark) {
							$mark = '\'';
							$clean .= $str;
						} elseif ($mark == '\'') {
							$mark = '';
						}
						break;
					case '/':
						if(empty($mark) && $sql[$i+1] == '*') {
							$mark = '/*';
							$clean .= $mark;
							$i++;
						} elseif($mark == '/*' && $sql[$i -1] == '*') {
							$mark = '';
							$clean .= '*';
						}
						break;
					case '#':
						if(empty($mark)) {
							$mark = $str;
							$clean .= $str;
						}
						break;
					case "\n":
						if($mark == '#' || $mark == '--') {
							$mark = '';
						}
						break;
					case '-':
						if(empty($mark)&& substr($sql, $i, 3) == '-- ') {
							$mark = '-- ';
							$clean .= $mark;
						}
						break;
	
					default:
	
						break;
				}
				$clean .= $mark ? '' : $str;
			}
		}
	
		$clean = preg_replace("/[^a-z0-9_\-\(\)#\*\/\"]+/is", "", strtolower($clean));
	
		if($_CONFIG['fullnote']) {
			$clean = str_replace('/**/','',$clean);
		}
	
		if(is_array($_CONFIG['action'])) {
			foreach($_CONFIG['action'] as $action) {
				if(strpos($clean,$action) !== false) return '-3';
			}
		}
	
		if($_CONFIG['likehex'] && strpos($clean, 'like0x')) {
			return '-2';
		}
	
		if(is_array($_CONFIG['note'])) {
			foreach($_CONFIG['note'] as $note) {
				if(strpos($clean,$note) !== false) return '-4';
			}
		}
	
		return 1;
	
	}
	
	
	/**
	 * 执行查询命令
	 *
	 * @access   private
	 * @param    string $cmd 查询命令
	 * @param    mixed $arg1   参数1
	 * @param    mixed $arg2  参数2
	 * @return   mixed
	 */
	private  function _execute($cmd , $arg1 = '', $arg2 = ''){
		$res = $this->db->$cmd($arg1, $arg2);
		return $res;
	}
	
	
	
	/**
	 * 获取 INSERT 操作产生的 ID
	 * @return mixed
	 */
	public  function insert_id(){
		return $this->_execute('insert_id');
	}
	
	
	/**
	 * 实现连贯操作
	 */
	public function __call($methodName,$args){
		if($args[0]!==''){
			$pre = strtoupper($methodName);
			switch ($pre){
				case 'GROUP':
					$pre = ' GROUP BY ';
					break;
				case 'ORDER':
					$pre = ' ORDER BY ';
					break;
			}
			
			$this->sql[$methodName] = $pre.' '.$args[0];
			if($methodName=='limit'){
				if(isset($args[1])){
					$this->sql['limit'] = 'LIMIT '.$args[0].','.$args[1];
				}else{
					$this->sql['limit'] = 'LIMIT '.$args[0];
				}
			}else{
				$this->sql['limit'] = '';
			}
		}else{
			$this->sql[$methodName] = '';
		}
		return $this;
	}
	
	
	/**
	 * 连贯操作执行的find查询操作
	 * @param string $field
	 */
	public function doFind($field='*'){
		$this->initSql();
		 $sql = "SELECT $field FROM {$this->pre}{$this->table} {$this->sql['where']} {$this->sql['group']} {$this->sql['having']} {$this->sql['order']} {$this->sql['limit']}";
		$this->check_query($sql);
		debug::start();
		$re =  $this->_execute('fetch_all', $sql);
		debug::end();
		debug::add("$sql  [".debug::spent()."]",1);
		return $re;
	}
	
	private function initSql(){
		$this->sql['where'] = isset($this->sql['where'])?$this->sql['where']:'';
		$this->sql['group'] = isset($this->sql['group'])?$this->sql['group']:'';
		$this->sql['order'] = isset($this->sql['order'])?$this->sql['order']:'';
		$this->sql['having'] = isset($this->sql['having'])?$this->sql['having']:'';
		$this->sql['limit'] = isset($this->sql['limit'])?$this->sql['limit']:'';
	}
	
	/**
	 * 连贯操作执行的更新操作
	 */
	public function doUpdate($data){
		$this->initSql();
		if(is_array($data)){
			$data = $this->getData($data);
			$sql = $this->implode_field_value($data);
		}else{
			$sql = $data;
		}
		$sql = "UPDATE {$this->pre}{$this->table} SET $sql {$this->sql['where']}";
		debug::start();
		$res = $this->db->query($sql);
		debug::end();
		debug::add("$sql  [".debug::spent()."]",1);
		return $res;
	}
	
	
	/**
	 * 连贯操作的
	 */
	public function doDelete(){
		$this->initSql();
		$sql = "DELETE FROM {$this->pre}{$this->table} {$this->sql['where']} {$this->sql['limit']}";	
		debug::start();
		$res = $this->db->query($sql);
		debug::end();
		debug::add("$sql  [".debug::spent()."]",1);
		return $res;
	}
	
	
	/**
	 * 连贯操作执行的find查询操作
	 * @param string $field
	 */
	public function count(){
		$this->initSql();
		$sql = "SELECT count(*) as count FROM {$this->pre}{$this->table}  {$this->sql['where']} {$this->sql['group']} {$this->sql['having']} {$this->sql['order']} {$this->sql['limit']}";
		$this->check_query($sql);
		debug::start();
		$re =  $this->_execute('fetch_first', $sql);
		debug::end();
		debug::add("$sql  [".debug::spent()."]",1);
		if(!empty($re)){
			
			return $re['count'];
		}
		return $re;
	}
}
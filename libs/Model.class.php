<?php
namespace libs;
/*
* 修改Model类添加上预处理
* prepare
  $user->field('id')->where()->limit()->groupBy->()->orderBy()->select()->save()->delete()->insert()
  将Model类实现ArrayAccess的接口，实现
    $model->username = 1;
    $model->password = 2;
    $model->save();
*/
class Model{
	private $host='127.0.0.1';
	private $username='root';
	private $password='';
	private $dbname;
	private $tablePrefix='';

	protected $tableName;
	private $connect ;
	private $where=''; //条件
	private $limit=''; // 条数限制
	private $order = ''; // 排序
	private $field ='*'; // 查询字段


	public function __construct(){
		
		$config = Configure::getConfigs();
		$db_config = $config['db'];
		foreach($db_config as $key=>$v){
			$this->$key = $v;
		}
		$dns = "mysql:host={$this->host};dbname={$this->dbname};charset=utf8";
		try{
			$this->connect = new \PDO($dns,$this->username,$this->password);
		}catch (PDOException $e) {
    		echo 'Connection failed: ' . $e->getMessage();
		}
	}

	public function insert($arr=[]){
		$sql = "insert into ".$this->tableName." set ";
		// insert inro set
		// insert into values
		$values = [];
		if(is_array($arr) && count($arr)>0){
			foreach($arr as $key=>$value){
				$values[]=$key." = '".$value."'";
			}
			$sql.= implode(',',$values);
		}
		
		if(is_string($arr)){
			$sql = $arr;
		}
		return $this->exec($sql,[],'insert');

	}

	public function save($arr=[]){
		// update tableName set 字段=值 where 条件
		$sql = "update ".$this->tableName.' set ';
		$values = [];
		foreach($arr as $key=>$value){

			$values[]=$key." = '".$value."'";	
		}
		$sql.= implode(',',$values);
		if($this->where)$sql.=' where '.$this->where;
		return $this->exec($sql,[],'update');

	}

	public function delete(){
		// delete from tableName where 
		$sql = 'delete ';
		$sql.=$this->mergeSql('delete');
		var_dump($sql);
		return $this->exec($sql,[],'delete');
	}

	public function where($arr=''){
		if(is_array($arr)){
			$where = [];
			$complex= isset($arr['complex']) ? " ".$arr['complex']." " : ' and ';
			foreach($arr as $key=>$v){
				if($key!='complex'){

					$where[] = ($key==='?' || strpos($key,':')===0) ? $key." = ".$v : $key." = '".$v."'";
				}
			}
			$this->where = implode($complex,$where); 
		}
		if(is_string($arr)){
			$this->where = $arr;
		}
		return $this;
	}

	public function limit($num,$offset=0){
		$this->limit = $offset.','.$num;
		return $this;
	}

	public function field($arr=''){
		if(is_array($arr)){
			$this->field = implode(',', $arr);
		}
		if(is_string($arr)){
			$this->field = $arr;
		}
		return $this;
	}

	public function orderBy($arr=''){
		if(is_array($arr)){
			$this->order = implode(',',$arr);
		}
		if(is_string($arr)){
			$this->order = $arr;
		}
		return $this;
	}
	public function select($arr=[]){
		
		$sql = "select ";
		$sql.=$this->mergeSql();
		//var_dump($sql);

		$stm = $this->exec($sql,$arr);
		return $stm->fetchAll(\PDO::FETCH_ASSOC);

	}
	public function mergeSql($kw='select'){
		// field where limit order
		$sql = '';
		if($kw !== 'delete'){
			if($this->field){
				$sql.= $this->field;
			}
		}
		if($this->tableName){
			$sql.=' from '.$this->tableName;
		}
		if($this->where){
			$sql.=' where '.$this->where;
		}
		if($this->order){
			$sql.=' order by '.$this->order;
		}
		if($this->limit){
			$sql.=' limit '.$this->limit;
		}
		return $sql;
	}

	public function table($tableName=''){
		if($tableName){
			$this->tableName = $tableName;
		}
		return $this;
	}

	public function exec($sql,$arr=[],$keyw='select'){
		if(is_array($arr) && count($arr)>0){
			$stm = $this->connect->prepare($sql);
			foreach($arr as $key=>$value){
				$stm->bindValue($key,$value);
			}
			$stm->execute();
			return $stm;
		}
		if($keyw=='select'){
			return $this->connect->query($sql);
		}
		return $this->connect->exec($sql);
	}

}
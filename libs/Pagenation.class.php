<?php 
 namespace libs;

/**
 * 封装分页类
 */
class Pagenation
{
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
	public function pages($tableName,$page=1,$offset=''){
		$limit=($page-1)*$offset;
		$sql="SELECT * FROM ".$tableName." limit $limit";
		if ($offset!='') {
			$sql.=",$offset";
		}
		$data=$this->connect->query($sql);
		$d=$data->fetchAll(\PDO::FETCH_ASSOC);	
		return $d;
	}
}


 ?>
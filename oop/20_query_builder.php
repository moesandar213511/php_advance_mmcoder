<?php 
	class DB{
		private static $dbh = null; // get connection
		private static $res,$data,$count,$sql;

		public function __construct(){
			self::$dbh = new PDO("mysql:host=localhost;dbname=php_basic_mmcoder",'root',''); // build PDO object
			echo "connected";
		}

		public function query($sql){
			self::$res = self::$dbh->prepare($sql);
			self::$res->execute();
			
			// for count 
			self::$count = self::$res->rowCount();
			return $this;
		}

		public function get(){ // if call get(), fetchAll 
			self::$data = self::$res->fetchAll(PDO::FETCH_OBJ);
			return self::$data;
		}

		public function getOne(){
			self::$data = self::$res->fetch(PDO::FETCH_OBJ);
			return self::$data;
		}

		public function count(){
			return self::$count;
		}

		public static function table($sql){
			$sql = "select * from $sql";
			self::$sql = $sql;
			$db = new DB();
			$db->query(self::$sql);
			return $db; // same like $this
		}

		public function orderBy($id,$value){
			self::$sql .= " order by $id $value";
			$this->query(self::$sql);
			return $this;
		}

		public function where($id,$operator,$value=""){
			if(func_num_args() == 2){
				self::$sql .= " where $id = $operator";
			}else{
				self::$sql .= " where $id $operator $value";
			}
			$this->query(self::$sql);
			return $this;
		}
	}

	// $db = new DB();
	// $user = $db->query("select * from users")->get();
	// echo "<pre>";
	// print_r($user);
	// echo "<br>=================================<br>";
	// $count = $db->query("select * from users")->count();
	// print_r($count);

	// $user = DB::table("users")->orderBy('id','desc')->get();
	// $user = DB::table("users")->where('id','>',1)->get();
	
	// 20 query builder
	$user = DB::table("users")->where('id',1)->getOne();
	echo "<pre>";
	print_r($user);
 ?>
<?php 
	class DB{
		private static $dbh = null; // get connection
		private static $res,$data,$count,$sql;

		public function __construct(){
			self::$dbh = new PDO("mysql:host=localhost;dbname=php_basic_mmcoder",'root',''); // build PDO object
			echo "connected";
		}

		public function query(){
			self::$res = self::$dbh->prepare(self::$sql);
			self::$res->execute();
			
			// for count 
			self::$count = self::$res->rowCount();
			return $this;
		}

		public function get(){ // if call get(), fetchAll 
			$this->query();
			self::$data = self::$res->fetchAll(PDO::FETCH_OBJ);
			return self::$data;
		}

		public function getOne(){
			$this->query();
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
			// $db->query();
			return $db; // same like $this
		}

		public function orderBy($id,$value){
			self::$sql .= " order by $id $value";
			$this->query();
			return $this;
		}

		public function where($id,$operator,$value=""){
			if(func_num_args() == 2){
				self::$sql .= " where $id = '$operator'";
			}else{
				self::$sql .= " where $id $operator '$value'";
			}
			// echo self::$sql;
			$this->query();
			return $this;
		}

		public function andWhere($id,$operator,$value=""){
			if(func_num_args() == 2){
				self::$sql .= " and $id = '$operator'";
			}else{
				self::$sql .= " and $id $operator '$value'";
			}
			// echo self::$sql;
			$this->query();
			return $this;
		}

		public function orWhere($id,$operator,$value=""){
			if(func_num_args() == 2){
				self::$sql .= " or $id = '$operator'";
			}else{
				self::$sql .= " or $id $operator '$value'";
			}
			// echo self::$sql;
			$this->query();
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
	// $user = DB::table("users")->where('id',1)->getOne();

	// 21 query builder
	
	// $user = DB::table('users')->where('id',1)->andWhere('name','Moe Moe')->get();
	// $user = DB::table('users')->where('name','LIKE','%m%')->get();
	// $user = DB::table('users')->where('name','LIKE','%m%')->count();
	

	// 22 query builder
	
	$user = DB::table('users')->where('name','LIKE','%m%')->orWhere('location','yangon')->get();
	

	echo "<pre>";
	print_r($user);
	
 ?>
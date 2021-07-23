<?php 
	class DB{
		private static $dbh = null; // get connection
		private static $res,$data,$count,$sql;

		public function __construct(){
			self::$dbh = new PDO("mysql:host=localhost;dbname=php_basic_mmcoder",'root',''); // build PDO object
			// echo "connected";
			self::$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); // if something wrong in sql, output error.
		}

		public function query($params = []){
			self::$res = self::$dbh->prepare(self::$sql);
			self::$res->execute($params);
			
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

		// 24 query builder
		public static function create($table,$data){
			// print_r(array_values($data));
			// die();

			$db = new DB();
			// echo "<pre>";
			// print_r(array_keys($data)); // array_keys() => to output array key 
			$arr_key = array_keys($data);
			$str_col = implode(',',$arr_key); // implode => convert from array to string
			$v = "";
			$x = 1;
			foreach($data as $d){
				$v .= "?";
				if($x < count($data)){
					$v .= ",";
					$x++;
				}
			}
			// echo $v;

			$sql = "insert into $table($str_col) values($v)";
			self::$sql = $sql;
			$value = array_values($data);
			$db->query($value);
			$id = self::$dbh->lastInsertId();
			return DB::table("users")->where('id',$id)->getOne();
			 // if have inserted, pdo not output inserted. output only id of inserted data.
			}
			 
			 // 25 update
			 public static function update($table,$data,$id){
			 	// update users set name=?,age=?,location=? where id=3
			 	$db = new DB();
			 	$sql = "update $table set ";
			 	$value = "";
			 	$x = 1;
			 	foreach ($data as $key => $v) {
			 		$value .= "$key=?";
			 		if($x < count($data)){
			 			$value .= ",";
			 			$x++;
			 		}
			 	}
			 	// echo $value;
			 	$sql .= "$value where id = $id";
			 	self::$sql = $sql;

			 	$db->query(array_values($data));
			 	return DB::table($table)->where('id',$id)->getOne();
			 }

			 public static function delete($table,$id){
			 	$sql = "delete from $table where id = $id";
			 	self::$sql = $sql;
			 	$db = new DB();
			 	$db->query();
			 	return true;
			}

			public function paginate($records_per_page){
				if(isset($_GET['page'])){
					$page_no = $_GET['page'];
				}
				if(!isset($_GET['page'])){
					$page_no = 1;
				}
				if(isset($_GET['page']) and $_GET['page'] < 1){
					$page_no = 1;
				}

				// get total count
				$this->query();
				$count = self::$count;
				// echo $count;

				// echo $page_no;
				
				// 1 0,5 => (1-1)*5 = 0
				// 2 5,5 => (2-1)*5 = 5
				// 3 10,5 => (3-1)*5 = 10
				// 4 15,5 => (4-1)*5 = 15
				
				// paginate 
				$index = ($page_no-1)*$records_per_page;
				self::$sql .= " limit $index,$records_per_page";
				// echo self::$sql;
				$this->query();
				self::$data = self::$res->fetchAll(PDO::FETCH_OBJ);

				// for previous and next page
				$pre_no = $page_no-1;
				$next_no = $page_no+1;

 				$pre_page = "?page=".$pre_no;
				$next_page = "?page=".$next_no;

				$data = [
					'data' => self::$data,
					'total' => $count,
					'pre_page' => $pre_page,
					'next_page' => $next_page
				];
				return $data;
			}
	}
 ?>


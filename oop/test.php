<?php 

class DB{
	private static $dbh=null; // get pdo
	private static $result,$data,$count,$sql;

	public function __construct(){
		self::$dbh = new PDO("mysql:host=localhost;dbname=php_basic_mmcoder;",'root','');
		self::$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		// echo "connected";
	}

	public function query($params = []){
		self::$result = self::$dbh->prepare(self::$sql);
		self::$result->execute($params);

		self::$count = self::$result->rowCount();

	}

	public function get(){
		// $this->query();
		return self::$result->fetchAll(PDO::FETCH_OBJ);
	}

	public function getOne(){
		$this->query();
		return self::$result->fetch(PDO::FETCH_OBJ);
	}

	public static function table($table){
		self::$sql = "select * from $table";
		$db = new DB();
		$db->query();
		return $db; // same like $this
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

	public function orderBy($id,$order){
		self::$sql .= " order by $id $order";
		$this->query();
		return $this;

	}

	public function count(){
		return self::$count;
	}

	public static function create($table,$data = []){
		// INSERT INTO users(name, age, location) VALUES (?,?,?);
		$arr_key =  implode(',',array_keys($data));
		$value = "";
		$x = 1;
		foreach($data as $d){
			$value .= "?";
			if($x < count($data)){
				$value .= ",";
				$x++;
			}
		}

		self::$sql .= "insert into $table($arr_key) values($value)";
		$arr_value = array_values($data);
		$db=new DB();
		$db->query($arr_value);
		$id = self::$dbh->lastInsertId();
		return DB::table('users')->where('id',$id)->getOne();
	}

	public static function update($table,$data,$id){
		// UPDATE users SET name=?,age=?,location=? WHERE 1
		$db = new DB();
		$value = "";
		$x = 1;
		foreach($data as $k=>$v){
			$value .= "$k = ?";
			if($x<count($data)){
				$value .= ",";
				$x++;
			}
		}
		// echo $value;
		self::$sql .= "update $table set $value where id = $id";
		return $db->query(array_values($data));
	}

	public static function delete($table,$id){
		self::$sql = "delete from $table where id = $id";
		$db = new DB();
		$db->query();
		return true;
	}

	public static function raw($sql){
		$db = new DB();
		self::$sql = $sql;
		return $db;
	}

	public function paginate($record_per_page){
		//SELECT * FROM `users` limit 0,5
		$count = self::$count;
		if(isset($_GET['page'])){
			$page_no = $_GET['page'];
		}else{
			$page_no = 1;
		}

		if(isset($_GET['page']) and $_GET['page'] < 1){
			$page_no = 1;
		}
		// echo $page_no;
		$index = ($page_no-1)*$record_per_page;
		self::$sql .= " limit $index,$record_per_page";
		$this->query();
		self::$data =  self::$result->fetchAll(PDO::FETCH_OBJ);
		
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

// $DB = new DB();
// $user = DB::table('users')->where('id','>',3)->orderBy('id','desc')->get();
// $user = DB::table('users')->where('id','>',3)->get();
// $user = DB::table('users')->where('name','LIKE','%m%')->count();
// DB::table('users')->where('name','LIKE','%m%')->orWhere('location','yangon')->get();

// $user = DB::create("users",[
// 	'name' => 'Moe Sandar',
// 	'age' => 25,
// 	'location' => 'Mandalay'
// ]);
// if($user){
// 	echo "Inserted Successfully<br>";
// 	echo "<pre>";
// 	print_r($user);
// }

// $user = DB::update("users",[
// 	'name' => 'MOE SANDAR',
// 	'age' => 30,
// 	'location' => 'yangon'
// ],2);
// print_r($user);

// if(DB::delete("users",26)){
// 	echo "Delete Success";
// }

// $user  = DB::table("users")->paginate(5);

$user  = DB::raw("select * from users")->paginate(5);
echo "<pre>";
print_r($user);
 ?>

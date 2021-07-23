<?php 
class Database{
	public $host = "localhost";
	public function connection(){
		return $this->host; // $this => represent the whole class
									  //can call any properties and functions within this class.
	}
	public function all($table){ //can insert default value => $table="users"
		return $table;
	}
}


// class User{
// 	public function detail(){
// 		$db = new Database();
// 		echo $db->connection();
// 	}
// }
// $db_user = new User();
// $db_user->detail();

// ================== OR can use extends =================

class User extends Database{
	public function detail(){
		echo $this->connection();
	}
}

$user = new User();
$user->detail();

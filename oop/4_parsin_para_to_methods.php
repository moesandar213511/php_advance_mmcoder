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

$db = new Database();
// echo $db->connection();
echo $db->all("users");
 ?>

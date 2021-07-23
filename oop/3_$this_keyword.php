<?php 
class Database{
	public $host = "localhost";
	public function connection(){
		return $this->host; // $this => represent the whole class
									  //can call any properties and functions within this class.
	}
}

$db = new Database();
echo $db->connection();
 ?>

<?php 
class Database{
	//properties <= variable
	public $host = "localhost";

	//methods, objects <= functions
	public function connection(){
		echo 'connected';
	}
}

$db = new Database();
// echo "<pre>";
// var_dump($db);
$db->connection();
echo $db->host;

 ?>
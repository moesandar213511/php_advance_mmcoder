<?php 
	class DB{
		private static $dbh = null; // get connection
		private static $res,$data,$count;

		public function __construct(){
			self::$dbh = new PDO("mysql:host=localhost;dbname=php_basic_mmcoder",'root',''); // build PDO object
			echo "connected";
		}

		public function query($sql){
			self::$res = self::$dbh->prepare($sql);
			self::$res->execute();
			self::$data = self::$res->fetchAll(PDO::FETCH_OBJ);

			// for row count
			self::$count = self::$res->rowCount();
			return $this;
		}

		public function get(){
			return self::$data;
		}

		public function count(){
			return self::$count;
		}
	}

	$db = new DB();
	$user = $db->query("select * from users")->get();
	echo "<pre>";
	print_r($user);
	echo "<br>=================================<br>";
	$count = $db->query("select * from users")->count();
	print_r($count);
 ?>

========================== END ========================

$sql = "select * from users";
self::$res = self::$pdo->prepare($sql);

run output
==========
PDOStatement Object
(
    [queryString] => select * from users
)

==========================================

$sql = "select * from users";
self::$res = self::$pdo->prepare($sql);
self::$data = self::$res->execute();

run output => 1

=========================================

self::$res = self::$pdo->prepare($sql);
self::$res->execute();
self::$data = self::$res->fetchAll(PDO::FETCH_OBJ);

run output
==========

Array
(
    [0] => stdClass Object
        (
            [id] => 1
            [name] => Moe Moe
            [age] => 22
            [location] => yangon
        )

    [1] => stdClass Object
        (
            [id] => 2
            [name] => Soe Soe
            [age] => 23
            [location] => mandalay
        )
)

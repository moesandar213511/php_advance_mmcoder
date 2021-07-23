<?php
	// design pattern => object and class ေတွရဲ့ အသွားအလာက်ု သတ်မတ် ေပးထားတဲ့ flow  
 	// instance
 	// property => static 
 	
 	class DB{
 		private static $instance; // pdo connection => self::$instance->prepare

 		public function __construct()
 		{
 			self::$instance = new PDO("mysql:host=localhost;dbname=php_basic_mmcoder",'root');
 			echo "connected";
 		}

 		public function getInstance(){
 			if(!self::$instance){
 				new DB();
 			}
 			return $this;
 		}

 		public function getAll($table){
 			$sql = "select * from $table";
 			$res = self::$instance->prepare($sql);
 			$res->execute();
 			return $res->fetchAll(PDO::FETCH_OBJ);
 		} 

 		public function getOne(){
 			$sql = "select * from users where id = 1";
 			$res = self::$instance->prepare($sql);
 			$res->execute();
 			return $res->fetch(PDO::FETCH_OBJ);
 		}
 	} 


 	$db = new DB();
 	// $user = $db->getInstance()->getAll('users');
 	$user = $db->getInstance()->getOne();
 	echo "<pre>";
 	print_r($user);


 ?>
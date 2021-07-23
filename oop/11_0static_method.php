<?php 
	// if call static from outside class or from another class,can call directly static property or method without building object.
	class Test{
		public static $name = "Moe Lay";

		public static function showName(){
			echo "This is static showName method";
		}

	}

	echo Test::$name; // if output properties and method with static keyword, can output using scope resolution operator, no need to build object.  
	echo Test::showName();
	echo "<br>";

	class Some{
		public function __construct(){
			echo Test::showName();
		}
	}

	$s = new Some();

 ?>

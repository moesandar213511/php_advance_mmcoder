<?php 
	// access modifier => public,protected,private
	// scope 1,2,3 can access public modifier.
	// only scope 1, 3(only using extends) can access protected modifier.
	// only scope 1 can access private modifier.
	
	// can access from another class properties and methods in one class using two methods
	// (1. build object in another class)
	// (2. Using extends)
	class Test{
		// scope 1
		
		public $name = "Moe Sandar";

		public function showName(){
			echo $this->name;
		}
	}

	$test = new Test();
	$test->showName();
	echo "<br>";

	// scope 2
	
	class Person extends Test{
		public function show_name(){
			echo $this->showName();
		}
		// scope 3
	}

	$person = new Person();
	$person->show_name();
?>
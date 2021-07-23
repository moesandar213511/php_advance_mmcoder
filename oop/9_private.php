<?php 
	// only scope 1 can access private modifier.
	class Test{
		// scope 1
		private $age = 24;

		public function showAge(){
			echo $this->age;
		}

		// ===========================
		
		private function showName(){
			echo "My name is Moe Sandar";
		}

		public function show_name(){
			echo $this->showName();
		}
		
	}

	// $test = new Test();
	// echo $test->age; // can't access age from outside Test class because of private modifier in Test class.
	
	// $test = new Test();
	// $test->showName(); // can't access showName from outside of Test class because of showName() with private modifier in Test class.
	// die();
	
	// ===================================================

	$test = new Test();
	$test->showAge(); // can access age with private modi from outside Test class with help of showAge() with public modifier in Test class.
	$test->show_name();// can access showName() with private modi from outside Test class with help of show_name() with public modifier in Test class.


	echo "<br>";

	// scope 2
	
	class Person extends Test{
		public function showAge(){
			echo $this->age; // can't access from within another class because of private modifier in Test class.
		}
		// scope 3
	}

	$person = new Person();
	$person->showAge();
?>
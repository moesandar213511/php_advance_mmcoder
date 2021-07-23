<?php 
	// access modifier => public,protected,private
	// scope 1,2,3 can access public modifier.
	
	// only scope 1, 3(only using extends) can access protected modifier.
	// if you want to use protected modifier from outside class, can access using show_age() within class.

	// only scope 1 can access private modifier.	
	// can access from another class properties and methods in one class using two methods
	// (1. build object in another class)
	// (2. Using extends)
	class Test{
		// scope 1
		protected $age = 24;

		public function show_age(){
			echo $this->age;
		}
		
	}

	// $test = new Test();
	// echo $test->age; //can't access age because of protected access modifier.
	
	// if you want to use protected modifier from outside class, can access using show_age() within class.
	$test = new Test();
	echo "show_age is ";
	echo $test->show_age();
	echo "<br>";

	// scope 2
	
	class Person extends Test{
		public function showAge(){
			// $t = new Test();
			// echo $t->age; // can't use because of protected access modifiter
			echo $this->age;
		}
		// scope 3
	}

	$person = new Person();
	$person->showAge();
?>
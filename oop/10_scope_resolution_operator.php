<?php 
	// constant variable is global variable, can use from anywhere.
	class Database{
		const HOST = "localhost";
	}
	echo Database::HOST; // class name::constant name (call with :: scope resolution operator because of constant variable)
	echo "<br>";

	class Test{ // no need to use extends because constant HOST is global variable.
		public function showHost(){
			echo Database::HOST;
		}
	}

	$t = new Test();
	$t->showHost();
 ?>
<?php 
	// if create abstract class, must start with abstract.
	// In the abstract class, method,propertiy and abstract method will have.
	// In the abstract class, at least abstract method must have.
	// Abstract method have not body.
	// If use abstract class, use by extends(can't use private).
	// (in only public and protected access modifier)
	// abstract help for error handling.
	
	abstract class Building{
		public $name = "SweetHome";

		abstract public function getWindows(); // abstract method	

		public function __construct(){
			echo "This is abstract constructor";
		}


	}

	class Home extends Building{
		public function getWindows(){
			echo $this->name;
		}
	}

	$h = new Home();
	echo "<br>";
	$h->getWindows();


 ?>
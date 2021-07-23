<?php 
	class Father{
		public function shwoFatherName(){
			echo "U Aung Aung";
		}
	}

	trait Mother{ // declare trait
		public function showMotherName(){
			echo "Daw Aye Aye";
		}
	}

	class Children extends Father{
		use Mother;
		public function __construct(){
			echo $this->shwoFatherName();
			echo "<br>";
			echo $this->showMotherName();
		}
	}

	$test = new Children();
	
 ?>
<?php 
	class Person{
		private $name,$age;

		public function setName($name){
			$this->name = $name;
			return $this; // return the whole class object OR properties and methods in the class object
		}

		public function setAge(){
			$this->age = 25;
			return $this;
		}

		public function getDetail(){
			echo $this->name." and ".$this->age;
		}
	}

	$p = new Person();
	// echo "<pre>";
	// var_dump($p->setName()->setAge()->getDetail());
	$p->setName('Moe Sandar')->setAge()->getDetail();
 ?>
<?php 
	// interface is similar with abstract.
	// In interface, access modifier must be public.
	// In interface, method is alll abstract method.
	// must not use properties.
	// if use interface, can use by implement.
	
	interface Animal{
		public function attack(); //Abstract method have not body.
		public function makeSong();
	}

	class Cat implements Animal{
		public function attack(){
			echo "scratch/ ";
		}
		public function makeSong(){
			echo " makeSong";
		}
	}

	class Dog implements Animal{
		public function attack(){
			echo "dog/ ";
		}
		public function makeSong(){
			echo " Arr wo";
		}
	}

	$c = new Cat();
	$c->attack();
	$c->makeSong();

	echo "<br>";

	$dd = new Dog();
	$dd->attack();
	$dd->makeSong();
 ?>
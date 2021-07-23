<?php
	class Test{
		public static $name  = "moe moe";

		public function showName(){
			//echo $this->name; //can't call non static method to static property with $this .
			
			echo self::$name; // if call from non static to static property or method within one class, use self and ::.
			//self is only work on static property and  method. 
			//====== < OR >======
			echo "<br>";
			echo Test::$name;
		}
	}

	$tt = new Test();
 	$tt->showName();
	echo "<br>";

 	// ============================================================
 	
 	// NOTE => no permission from static property or method to non-static property or method within one class using $this. One method can use is using building object. 
 	
 	class Check{ 
 		public $name = "sandar";

 		public static function showName(){
 			$tt = new Check(); // call from static method to non static property, can call building object.
 			echo $tt->name;
 		}
 	}
 	Check::showName();
 	echo "<br>";
 ?>



// NOTE
========
// If call from Non-Static property or method to Static property or method within one class, 
can use => using self keyword and :: ( echo self::$name; ) only inside class
		=> using direct class name and :: ( echo Test::$name; ) both inside and outside class
// If call Static property or method, no need to build object.
//self is only work on static property and  method. 

// if call from Static method to Non-Static property within one class, can call building object.


// Main Note
// if call from Non-Static to Static property or method from scope 1,2,3 , no need to build object. 
	=> class_name::static property or method name;
// if call Static property or method from scope 1(with one class)
	=> can use self keyword::static property or method name;
	=> class_name::static property or method name;

// if call from static or Non-static property or method from scope 1,2,3, can call by building object.


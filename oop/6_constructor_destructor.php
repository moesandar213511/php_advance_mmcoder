<?php 
	// php magic method => constructor,destructor, etc.
	// continue to study magic method
	class Test{
		// constructor => class တစ်ခုလုံးကို object ေဆာက်လိုက်တဲ့အချိန်မာ စအလုပ်လုပ်။
		public function __construct(){
			echo 'construct-';
		}

		public function show(){
			echo 'show method';
		}

		// destructor => class ြကီးထဲက အလုပ် ေတအကုန်လုပ်ပီးတဲ့အချိန်မာ အလုပ်လုပ်။
		public function __destruct(){
			echo '-destruct';
		}
	}

	$test = new Test();
	$test->show();
?>

<!-- __construct(), __destruct(), __call(), __callStatic(), __get(), __set(), __isset(), __unset(), __sleep(), __wakeup(), __serialize(), __unserialize(), __toString(), __invoke(), __set_state(), __clone(), and __debugInfo() -->
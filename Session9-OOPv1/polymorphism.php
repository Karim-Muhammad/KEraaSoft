<?php

interface Greeting {
	public function Hello();
}

class GreetingC {
	public function Hello() {
		
	};
}

class Greet1 implements Greeting {
	public function Hello() {
		echo "Hello Brother!";
	}
}

Greeting $object = new Greet1();
<?php
/* Example of "late static binding" where the class name is resolved at runtime.
Used to reference the called class in a context of static inheritance. */

class Superclass {
    const SOMETHING = 'something';
	public static function getClassName() {
		echo __CLASS__;
	}
	public static function getClass() {
		//self:: bound and refers to the current class
		self::getClassName();

		//static:: bound and refers to the calling class at runtime
		static::getClassName();
	}
}

class Subclass extends Superclass {
	public static function getClassName() {
		echo __CLASS__;
	}
}

Subclass::getClass();
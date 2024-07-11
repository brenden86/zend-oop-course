<?php
class Foo {
    static function callIt(callable $callback) {
        $callback();
    }

    static function doStuff() {
        echo "Hello World!";
    }
}

Foo::callIt('foo::doStuff');
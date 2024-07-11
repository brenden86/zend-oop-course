<?php
// generic type hint "object" allowed as of PHP 7.2
function test(object $obj) : object
{
    return $obj;
}

var_dump(test(new StdClass()));
var_dump(test(new class() {}));
var_dump(test(new DateTime()));
// output:
/*
object(stdClass)#1 (0) {
}
object(class@anonymous)#1 (0) {
}
object(DateTime)#1 (3) {
  ["date"]=>
  string(26) "2017-12-21 05:52:03.171409"
  ["timezone_type"]=>
  int(3)
  ["timezone"]=>
  string(3) "UTC"
}
*/

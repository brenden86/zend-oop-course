<?php
// Parameter types from overridden methods and from interface implementations may now be omitted.
interface A
{
    public function test(array $input);
}

class B implements A
{
    // type omitted for $input
    public function test($input)
    {
        return 'You requested ' . htmlspecialchars($input);
    }
}

$b = new B();
echo $b->test('something');
// PHP 7.1 and below: "Fatal error: Declaration of B::test($input) must be compatible with A ..."
// PHP 7.2 and above: "You requested something"

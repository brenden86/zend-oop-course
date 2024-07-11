<?php
// demonstrates usage of magic method "__toString()"

class User
{
    protected $id;
    protected $fname;
    protected $lname;
    public function __construct($id = 0, $fname = '', $lname = '')
    {
        $this->id = $id;
        $this->fname = $fname;
        $this->lname = $lname;
    }
    public function __toString()
    {
        return $this->fname . ' ' . $this->lname;
    }
}

$user = new User(1, 'Fred', 'Flintstone');
echo $user; // outputs: "Fred Flintstone"

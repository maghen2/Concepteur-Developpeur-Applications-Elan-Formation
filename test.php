<?php
class Test{
    private $name="Test";
    public function __construct(){
        echo "Hello World";
    }
    public function &getName(){
        return $this->name;
    }
}

$test = new Test();
echo $test->getName();
$test->name="Test2";
echo $test->getName();

